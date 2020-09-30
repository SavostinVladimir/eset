<?php
// This file is part of Eset - http://eset.org/
//
// Eset is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Eset is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Eset.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Unit tests for the block_html implementation of the privacy API.
 *
 * @package    block_html
 * @category   test
 * @copyright  2018 Andrew Nicols <andrew@nicols.co.uk>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

use \core_privacy\local\metadata\collection;
use \core_privacy\local\request\writer;
use \core_privacy\local\request\approved_contextlist;
use \core_privacy\local\request\deletion_criteria;
use \tool_usertours\tour;
use \tool_usertours\privacy\provider;

/**
 * Unit tests for the block_html implementation of the privacy API.
 *
 * @copyright  2018 Andrew Nicols <andrew@nicols.co.uk>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class tool_usertours_privacy_testcase extends \core_privacy\tests\provider_testcase {

    protected function create_test_tour(): tour {
        return (new tour())
            ->set_name('test_tour')
            ->set_description('Test tour')
            ->set_enabled(true)
            ->set_pathmatch('/')
            ->persist();
    }

    /**
     * Ensure that get_metadata exports valid content.
     */
    public function test_get_metadata() {
        $items = new collection('tool_usertours');
        $result = provider::get_metadata($items);
        $this->assertSame($items, $result);
        $this->assertInstanceOf(collection::class, $result);
    }

    /**
     * Ensure that export_user_preferences returns no data if the user has completed no tours.
     */
    public function test_export_user_preferences_no_pref() {
        $user = \core_user::get_user_by_username('admin');
        provider::export_user_preferences($user->id);

        $writer = writer::with_context(\context_system::instance());

        $this->assertFalse($writer->has_any_data());
    }

    /**
     * Ensure that export_user_preferences returns request completion data.
     */
    public function test_export_user_preferences_completed() {
        global $DB;

        $this->resetAfterTest();
        $this->setAdminUser();

        $tour = $this->create_test_tour();

        $user = \core_user::get_user_by_username('admin');
        $tour->mark_user_completed();
        provider::export_user_preferences($user->id);

        $writer = writer::with_context(\context_system::instance());

        $this->assertTrue($writer->has_any_data());
        $prefs = $writer->get_user_preferences('tool_usertours');

        $this->assertCount(1, (array) $prefs);
    }

    /**
     * Ensure that export_user_preferences returns request completion data.
     */
    public function test_export_user_preferences_requested() {
        global $DB;

        $this->resetAfterTest();
        $this->setAdminUser();

        $tour = $this->create_test_tour();

        $user = \core_user::get_user_by_username('admin');
        $tour->mark_user_completed();
        $tour->request_user_reset();
        provider::export_user_preferences($user->id);

        $writer = writer::with_context(\context_system::instance());

        $this->assertTrue($writer->has_any_data());
        $prefs = $writer->get_user_preferences('tool_usertours');

        $this->assertCount(2, (array) $prefs);
    }

    /**
     * Ensure that export_user_preferences excludes deleted tours.
     */
    public function test_export_user_preferences_deleted_tour() {
        global $DB;

        $this->resetAfterTest();
        $this->setAdminUser();

        $tour1 = $this->create_test_tour();
        $tour2 = $this->create_test_tour();

        $user = \core_user::get_user_by_username('admin');

        $alltours = $DB->get_records('tool_usertours_tours');

        $tour1->mark_user_completed();

        $tour2->mark_user_completed();
        $tour2->remove();

        $writer = writer::with_context(\context_system::instance());

        provider::export_user_preferences($user->id);
        $this->assertTrue($writer->has_any_data());

        // We should have one preference.
        $prefs = $writer->get_user_preferences('tool_usertours');
        $this->assertCount(1, (array) $prefs);

        // The preference should be related to the first tour.
        $this->assertContains($tour1->get_name(), reset($prefs)->description);
    }
}