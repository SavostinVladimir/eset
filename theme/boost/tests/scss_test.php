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
 * This file contains the unittests for boost's scss compilation.
 *
 * @package   theme_boost
 * @copyright 2018 Cameron Ball <cameron@cameron1729.xyz>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

/**
 * Unit tests for scss compilation.
 *
 * @package   theme_boost
 * @copyright 2016 onwards Ankit Agarwal
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class theme_boost_scss_testcase extends advanced_testcase {
    /**
     * Test that boost can be compiled using SassC (the defacto implemention).
     */
    public function test_scss_compilation_with_sassc() {
        if (!defined('PHPUNIT_PATH_TO_SASSC')) {
            $this->markTestSkipped('Path to SassC not provided');
        }

        $this->resetAfterTest();
        set_config('pathtosassc', PHPUNIT_PATH_TO_SASSC);

        $this->assertNotEmpty(
            theme_config::load('boost')->get_css_content_debug('scss', null, null)
        );
    }
}
