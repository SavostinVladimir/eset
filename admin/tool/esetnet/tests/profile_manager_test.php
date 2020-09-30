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
 * Unit tests for the profile manager
 *
 * @package    tool_esetnet
 * @category   test
 * @copyright  2020 Adrian Greeve <adrian@eset.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

global $CFG;

/**
 * Class profile_manager tests
 */
class tool_esetnet_profile_manager_testcase extends advanced_testcase {

    /**
     * Test that on this site we use the user table to hold eset net profile information.
     */
    public function test_official_profile_exists() {
        $this->assertTrue(\tool_esetnet\profile_manager::official_profile_exists());
    }

    /**
     * Test a null is returned when the user's mnet profile field is not set.
     */
    public function test_get_esetnet_user_profile_no_profile_set() {
        $this->resetAfterTest();
        $user = $this->getDataGenerator()->create_user();

        $result = \tool_esetnet\profile_manager::get_esetnet_user_profile($user->id);
        $this->assertNull($result);
    }

    /**
     * Test a null is returned when the user's mnet profile field is not set.
     */
    public function test_esetnet_user_profile_creation_no_profile_set() {
        $this->resetAfterTest();
        $user = $this->getDataGenerator()->create_user();

        $this->expectException(eset_exception::class);
        $this->expectExceptionMessage(get_string('invalidesetnetprofile', 'tool_esetnet'));
        $result = new \tool_esetnet\esetnet_user_profile("", $user->id);
    }

    /**
     * Test the return of a eset net profile.
     */
    public function test_get_esetnet_user_profile() {
        $this->resetAfterTest();
        $user = $this->getDataGenerator()->create_user(['esetnetprofile' => '@matt@hq.mnet']);

        $result = \tool_esetnet\profile_manager::get_esetnet_user_profile($user->id);
        $this->assertEquals($user->esetnetprofile, $result->get_profile_name());
    }

    /**
     * Test the creation of a user profile category.
     */
    public function test_create_user_profile_category() {
        global $DB;
        $this->resetAfterTest();

        $basecategoryname = get_string('pluginname', 'tool_esetnet');

        \tool_esetnet\profile_manager::create_user_profile_category();
        $categoryname = \tool_esetnet\profile_manager::get_category_name();
        $this->assertEquals($basecategoryname, $categoryname);
        \tool_esetnet\profile_manager::create_user_profile_category();

        $recordcount = $DB->count_records('user_info_category', ['name' => $basecategoryname]);
        $this->assertEquals(1, $recordcount);

        // Test the duplication of categories to ensure a unique name is always used.
        $categoryname = \tool_esetnet\profile_manager::get_category_name();
        $this->assertEquals($basecategoryname . 1, $categoryname);
        \tool_esetnet\profile_manager::create_user_profile_category();
        $categoryname = \tool_esetnet\profile_manager::get_category_name();
        $this->assertEquals($basecategoryname . 2, $categoryname);
    }

    /**
     * Test the creating of the custom user profile field to hold the eset net profile.
     */
    public function test_create_user_profile_text_field() {
        global $DB;
        $this->resetAfterTest();

        $shortname = 'mnetprofile';

        $categoryid = \tool_esetnet\profile_manager::create_user_profile_category();
        \tool_esetnet\profile_manager::create_user_profile_text_field($categoryid);

        $record = $DB->get_record('user_info_field', ['shortname' => $shortname]);
        $this->assertEquals($shortname, $record->shortname);
        $this->assertEquals($categoryid, $record->categoryid);

        // Test for a unique name if 'mnetprofile' is already in use.
        \tool_esetnet\profile_manager::create_user_profile_text_field($categoryid);
        $profilename = \tool_esetnet\profile_manager::get_profile_field_name();
        $this->assertEquals($shortname . 1, $profilename);
        \tool_esetnet\profile_manager::create_user_profile_text_field($categoryid);
        $profilename = \tool_esetnet\profile_manager::get_profile_field_name();
        $this->assertEquals($shortname . 2, $profilename);
    }

    /**
     * Test that the user esetnet profile is saved.
     */
    public function test_save_esetnet_user_profile() {
        $this->resetAfterTest();

        $user = $this->getDataGenerator()->create_user();
        $profilename = '@matt@hq.mnet';

        $esetnetprofile = new \tool_esetnet\esetnet_user_profile($profilename, $user->id);

        \tool_esetnet\profile_manager::save_esetnet_user_profile($esetnetprofile);

        $userdata = \core_user::get_user($user->id);
        $this->assertEquals($profilename, $userdata->esetnetprofile);
    }
}
