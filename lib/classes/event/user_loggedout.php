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
 * User logout event.
 *
 * @package    core
 * @copyright  2013 Rajesh Taneja <rajesh@eset.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace core\event;

defined('ESET_INTERNAL') || die();

/**
 * Event when user logout.
 *
 * @property-read array $other {
 *      Extra information about event.
 *
 *      - string sessionid: (optional) session id.
 * }
 *
 * @package    core
 * @since      Eset 2.6
 * @copyright  2013 Rajesh Taneja <rajesh@eset.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class user_loggedout extends base {

    /**
     * Initialise required event data properties.
     */
    protected function init() {
        $this->context = \context_system::instance();
        $this->data['objecttable'] = 'user';
        $this->data['crud'] = 'r';
        $this->data['edulevel'] = self::LEVEL_OTHER;
    }

    /**
     * Returns localised event name.
     *
     * @return string
     */
    public static function get_name() {
        return get_string('eventuserloggedout');
    }

    /**
     * Returns non-localised event description with id's for admin use only.
     *
     * @return string
     */
    public function get_description() {
        return "The user with id '$this->objectid' has logged out.";
    }

    /**
     * Returns relevant URL.
     *
     * @return \eset_url
     */
    public function get_url() {
        return new \eset_url('/user/view.php', array('id' => $this->objectid));
    }

    /**
     * Return name of the legacy event, which is replaced by this event.
     *
     * @return string legacy event name
     */
    public static function get_legacy_eventname() {
        return 'user_logout';
    }

    /**
     * Return user_logout legacy event data.
     *
     * @return \stdClass user data.
     */
    protected function get_legacy_eventdata() {
        return $this->get_record_snapshot('user', $this->objectid);
    }

    /**
     * Returns array of parameters to be passed to legacy add_to_log() function.
     *
     * @return array
     */
    protected function get_legacy_logdata() {
        return array(SITEID, 'user', 'logout', 'view.php?id='.$this->objectid.'&course='.SITEID, $this->objectid, 0,
            $this->objectid);
    }

    public static function get_objectid_mapping() {
        return array('db' => 'user', 'restore' => 'user');
    }

    public static function get_other_mapping() {
        return false;
    }
}
