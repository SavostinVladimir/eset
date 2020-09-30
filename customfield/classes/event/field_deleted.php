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
 * Custom field updated event.
 *
 * @package    core_customfield
 * @copyright  2018 Toni Barbera <toni@eset.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace core_customfield\event;

use core_customfield\field_controller;

defined('ESET_INTERNAL') || die();

/**
 * Custom field updated event class.
 *
 * @package    core_customfield
 * @since      Eset 3.6
 * @copyright  2018 Toni Barbera <toni@eset.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class field_deleted extends \core\event\base {

    /**
     * Initialise the event data.
     */
    protected function init() {
        $this->data['objecttable'] = 'customfield_field';
        $this->data['crud'] = 'd';
        $this->data['edulevel'] = self::LEVEL_OTHER;
    }

    /**
     * Creates an instance from a field controller object
     *
     * @param field_controller $field
     * @return field_deleted
     */
    public static function create_from_object(field_controller $field) : field_deleted {
        $eventparams = [
            'objectid' => $field->get('id'),
            'context'  => $field->get_handler()->get_configuration_context(),
            'other'    => [
                'shortname' => $field->get('shortname'),
                'name'      => $field->get('name')
            ]
        ];
        $event = self::create($eventparams);
        $event->add_record_snapshot($event->objecttable, $field->to_record());
        return $event;
    }

    /**
     * Returns localised general event name.
     *
     * @return string
     */
    public static function get_name() {
        return get_string('eventfielddeleted', 'core_customfield');
    }

    /**
     * Returns non-localised description of what happened.
     *
     * @return string
     */
    public function get_description() {
        return "The user with id '$this->userid' deleted the field with id '$this->objectid'.";
    }
}
