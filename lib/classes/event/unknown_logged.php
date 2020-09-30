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
 * Unknown event.
 *
 * @package    core
 * @since      Eset 2.7
 * @copyright  2014 Petr Skoda
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace core\event;

defined('ESET_INTERNAL') || die();

/**
 * Unknown event class.
 *
 * @package    core
 * @since      Eset 2.7
 * @copyright  2014 Petr Skoda
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class unknown_logged extends base {
    public function init() {
        throw new \coding_exception('unknown events cannot be triggered');
    }

    public static function get_name() {
        return get_string('eventunknownlogged', 'core');
    }

    public function get_description() {
        return 'Unknown event (' . $this->eventname . ')';
    }
}
