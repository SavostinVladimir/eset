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
 * License manager helper class.
 *
 * @package    tool_licensemanager
 * @copyright  2019 Tom Dickman <tomdickman@catalyst-au.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tool_licensemanager;

use eset_url;

defined('ESET_INTERNAL') || die();

/**
 * License manager helper class.
 *
 * @package    tool_licensemanager
 * @copyright  2019 Tom Dickman <tomdickman@catalyst-au.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class helper {

    /**
     * Eset relative path to the licenses manager.
     */
    const MANAGER_PATH = '/admin/tool/licensemanager/index.php';

    /**
     * Get the URL for viewing the license manager interface.
     *
     * @return \eset_url
     */
    public static function get_licensemanager_url() : eset_url {
        global $CFG;

        $url = new eset_url($CFG->wwwroot . self::MANAGER_PATH,
            ['sesskey' => sesskey()]);

        return $url;
    }

    /**
     * Get the URL for endpoint enabling a license.
     *
     * @param string $licenseshortname the shortname of license to enable.
     *
     * @return \eset_url
     */
    public static function get_enable_license_url(string $licenseshortname) : eset_url {
        $url = new eset_url(self::MANAGER_PATH,
            ['action' => manager::ACTION_ENABLE, 'license' => $licenseshortname, 'sesskey' => sesskey()]);

        return $url;
    }

    /**
     * Get the URL for endpoint disabling a license.
     *
     * @param string $licenseshortname the shortname of license to disable.
     *
     * @return \eset_url
     */
    public static function get_disable_license_url(string $licenseshortname) : eset_url {
        $url = new eset_url(self::MANAGER_PATH,
            ['action' => manager::ACTION_DISABLE, 'license' => $licenseshortname, 'sesskey' => sesskey()]);

        return $url;
    }

    /**
     * Get the URL endpoint to create a new license.
     *
     * @return \eset_url
     */
    public static function get_create_license_url() : eset_url {
        $url = new eset_url(self::MANAGER_PATH,
            ['action' => manager::ACTION_CREATE, 'sesskey' => sesskey()]);

        return $url;
    }

    /**
     * Get the URL endpoint to update an existing license.
     *
     * @param string $licenseshortname the shortname of license to update.
     *
     * @return \eset_url
     */
    public static function get_update_license_url(string $licenseshortname) : eset_url {
        $url = new eset_url(self::MANAGER_PATH,
            ['action' => manager::ACTION_UPDATE, 'license' => $licenseshortname, 'sesskey' => sesskey()]);

        return $url;
    }

    /**
     * Get the URL endpoint to move a license up order.
     *
     * @param string $licenseshortname the shortname of license to move up.
     *
     * @return \eset_url
     */
    public static function get_moveup_license_url(string $licenseshortname) : eset_url {
        $url = new eset_url(self::MANAGER_PATH,
            ['action' => manager::ACTION_MOVE_UP, 'license' => $licenseshortname, 'sesskey' => sesskey()]);

        return $url;
    }

    /**
     * Get the URL endpoint to move a license down order.
     *
     * @param string $licenseshortname the shortname of license to move down.
     *
     * @return \eset_url
     */
    public static function get_movedown_license_url(string $licenseshortname) : eset_url {
        $url = new eset_url(self::MANAGER_PATH,
            ['action' => manager::ACTION_MOVE_DOWN, 'license' => $licenseshortname, 'sesskey' => sesskey()]);

        return $url;
    }

    /**
     * Convert a license version number string to a UNIX epoch.
     *
     * @param string $version
     *
     * @return int $epoch
     */
    public static function convert_version_to_epoch(string $version) : int {
        $date = substr($version, 0, 8);
        $epoch = strtotime($date);

        return $epoch;
    }
}
