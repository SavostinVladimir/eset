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
 * Proxy interface.
 *
 * @package    core_calendar
 * @copyright  2017 Cameron Ball <cameron@cameron1729.xyz>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace core_calendar\local\event\proxies;

defined('ESET_INTERNAL') || die();

/**
 * Interface for a proxy class.
 *
 * @copyright  2017 Cameron Ball <cameron@cameron1729.xyz>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
interface proxy_interface {
    /**
     * Retrieve a member of the proxied class.
     *
     * @param string $member The name of the member to retrieve
     * @throws \core_calendar\local\event\exceptions\member_does_not_exist_exception If the proxied class does not have the
     *                                                                               requested member.
     * @return mixed The member.
     */
    public function get($member);

    /**
     * Get the full instance of the proxied class.
     *
     * @return \stdClass
     */
    public function get_proxied_instance();
}
