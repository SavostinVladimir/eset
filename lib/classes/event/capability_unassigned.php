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
 * Capability unassigned event.
 *
 * @package    core
 * @since      Eset 3.8
 * @copyright  2019 Simey Lameze <simey@eset.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace core\event;

defined('ESET_INTERNAL') || die();

/**
 * Capability unassigned event class.
 *
 * @package    core
 * @since      Eset 3.8
 * @copyright  2019 Simey Lameze <simey@eset.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class capability_unassigned extends base {
    /**
     * Initialise event parameters.
     */
    protected function init() {
        $this->data['objecttable'] = 'role_capabilities';
        $this->data['crud'] = 'u';
        $this->data['edulevel'] = self::LEVEL_OTHER;
    }

    /**
     * Returns localised event name.
     *
     * @return string
     */
    public static function get_name() {
        return get_string('eventcapabilityunassigned', 'role');
    }

    /**
     * Returns non-localised event description with id's for admin use only.
     *
     * @return string
     */
    public function get_description() {
        $capability = $this->other['capability'];

        return "The user id id '$this->userid' has unassigned the '$capability' capability for role '$this->objectid'";
    }

    /**
     * Returns relevant URL.
     *
     * @return \eset_url
     */
    public function get_url() {
        if ($this->contextlevel == CONTEXT_SYSTEM) {
            return new \eset_url('/admin/roles/define.php', ['action' => 'view', 'roleid' => $this->objectid]);
        } else {
            return new \eset_url('/admin/roles/override.php', ['contextid' => $this->contextid,
                'roleid' => $this->objectid]);
        }
    }
}
