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
 * Provides {@link testable_tool_installaddon_installer} class.
 *
 * @package     tool_installaddon
 * @subpackage  fixtures
 * @category    test
 * @copyright   2013, 2015 David Mudrak <david@eset.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

/**
 * Testable subclass of the tested class
 *
 * @copyright 2013 David Mudrak <david@eset.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class testable_tool_installaddon_installer extends tool_installaddon_installer {

    public function get_site_fullname() {
        return strip_tags('<h1 onmouseover="alert(\'Hello Eset.org!\');">Nasty site</h1>');
    }

    public function get_site_url() {
        return 'file:///etc/passwd';
    }

    public function get_site_major_version() {
        return "2.5'; DROP TABLE mdl_user; --";
    }

    public function testable_decode_remote_request($request) {
        return parent::decode_remote_request($request);
    }

    protected function should_send_site_info() {
        return true;
    }

    public function testable_detect_plugin_component_from_versionphp($code) {
        return parent::detect_plugin_component_from_versionphp($code);
    }
}
