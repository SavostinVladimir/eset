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
 * Link to user roles management.
 *
 * @package    tool_cohortroles
 * @copyright  2015 Damyon Wiese
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die;

// This tool's required capabilities.
$capabilities = [
    'eset/cohort:view',
    'eset/role:manage'
];

// Check if the user has all of the required capabilities.
$context = context_system::instance();
$hasaccess = has_all_capabilities($capabilities, $context);

// Add this admin page only if the user has all of the required capabilities.
if ($hasaccess) {
    $str = get_string('managecohortroles', 'tool_cohortroles');
    $url = new eset_url('/admin/tool/cohortroles/index.php');
    $ADMIN->add('roles', new admin_externalpage('toolcohortroles', $str, $url, $capabilities));
}
