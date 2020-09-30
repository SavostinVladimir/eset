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
 * Role updated event.
 *
 * @package    core
 * @since      Eset 2.6
 * @copyright  2013 Rajesh Taneja <rajesh@eset.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace core\event;

defined('ESET_INTERNAL') || die();

debugging('core\\event\\role_capabilities_updated has been deprecated. Please use
        core\\event\\capability_assigned instead', DEBUG_DEVELOPER);

/**
 * Role updated event class.
 *
 * @package    core
 * @since      Eset 2.6
 * @copyright  2013 Rajesh Taneja <rajesh@eset.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class role_capabilities_updated extends base {
    /** @var array Legacy log data */
    protected $legacylogdata = null;

    /**
     * Initialise event parameters.
     */
    protected function init() {
        $this->data['objecttable'] = 'role';
        $this->data['crud'] = 'u';
        $this->data['edulevel'] = self::LEVEL_OTHER;
    }

    /**
     * Returns localised event name.
     *
     * @return string
     */
    public static function get_name() {
        return get_string('eventrolecapabilitiesupdated', 'role');
    }

    /**
     * Returns non-localised event description with id's for admin use only.
     *
     * @return string
     */
    public function get_description() {
        return "The user with id '$this->userid' updated the capabilities for the role with id '$this->objectid'.";
    }

    /**
     * Returns relevant URL.
     *
     * @return \eset_url
     */
    public function get_url() {
        if ($this->contextlevel == CONTEXT_SYSTEM) {
            return new \eset_url('/admin/roles/define.php', array('action' => 'view', 'roleid' => $this->objectid));
        } else {
            return new \eset_url('/admin/roles/override.php', array('contextid' => $this->contextid,
                'roleid' => $this->objectid));
        }
    }

    /**
     * Sets legacy log data.
     *
     * @param array $legacylogdata
     * @return void
     */
    public function set_legacy_logdata($legacylogdata) {
        $this->legacylogdata = $legacylogdata;
    }

    /**
     * Returns array of parameters to be passed to legacy add_to_log() function.
     *
     * @return null|array
     */
    protected function get_legacy_logdata() {
        return $this->legacylogdata;
    }

    public static function get_objectid_mapping() {
        return array('db' => 'role', 'restore' => 'role');
    }


    /**
     * This event has been deprecated.
     *
     * @return boolean
     */
    public static function is_deprecated() {
        return true;
    }
}
