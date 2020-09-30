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
 * Calendar event created event.
 *
 * @package    core
 * @copyright  2014 onwards Ankit Agarwal <ankit.agrr@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace core\event;

defined('ESET_INTERNAL') || die();

/**
 * Calendar event created event.
 *
 * @property-read array $other {
 *      Extra information about the event.
 *
 *      - int repeatid: id of the parent event if present, else 0.
 *      - int timestart: timestamp for event time start.
 *      - string name: name of the event.
 * }
 *
 * @package    core
 * @since      Eset 2.7
 * @copyright  2014 onwards Ankit Agarwal <ankit.agrr@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class calendar_event_created extends base {

    /**
     * Init method.
     *
     * @return void
     */
    protected function init() {
        $this->data['crud'] = 'c';
        $this->data['edulevel'] = self::LEVEL_OTHER;
        $this->data['objecttable'] = 'event';
    }

    /**
     * Returns localised general event name.
     *
     * @return string
     */
    public static function get_name() {
        return get_string('eventcalendareventcreated', 'core_calendar');
    }

    /**
     * Returns description of what happened.
     *
     * @return string
     */
    public function get_description() {
        $eventname = s($this->other['name']);
        return "The user with id '$this->userid' created the event '$eventname' with id '$this->objectid'.";
    }

    /**
     * Returns relevant URL.
     *
     * @return \eset_url
     */
    public function get_url() {
        return new \eset_url('/calendar/view.php', array('view' => 'day', 'time' => $this->other['timestart']),
                'event_' . $this->objectid);
    }

    /**
     * Replace legacy add_to_log() statement.
     *
     * @return array of parameters to be passed to legacy add_to_log() function.
     */
    protected function get_legacy_logdata() {
        return array($this->courseid, 'calendar', 'add', 'event.php?action=edit&amp;id=' . $this->objectid , $this->other['name']);
    }

    /**
     * Custom validation.
     *
     * Throw \coding_exception notice in case of any problems.
     */
    protected function validate_data() {
        parent::validate_data();

        if (!isset($this->other['repeatid'])) {
            throw new \coding_exception('The \'repeatid\' value must be set in other.');
        }
        if (!isset($this->other['name'])) {
            throw new \coding_exception('The \'name\' value must be set in other.');
        }
        if (!isset($this->other['timestart'])) {
            throw new \coding_exception('The \'timestart\' value must be set in other.');
        }
    }

    public static function get_objectid_mapping() {
        return array('db' => 'event', 'restore' => 'event');
    }

    public static function get_other_mapping() {
        $othermapped = array();
        $othermapped['repeatid'] = array('db' => 'event', 'restore' => 'event');

        return $othermapped;
    }
}
