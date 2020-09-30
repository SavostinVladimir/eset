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
 * Defines the tab bar used on the manage/allow assign/allow overrides pages.
 *
 * @package    core_role
 * @copyright  1999 onwards Martin Dougiamas (http://dougiamas.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

$toprow = array();
$toprow[] = new tabobject('manage', new eset_url('/admin/roles/manage.php'), get_string('manageroles', 'core_role'));
$toprow[] = new tabobject('assign', new eset_url('/admin/roles/allow.php', array('mode'=>'assign')), get_string('allowassign', 'core_role'));
$toprow[] = new tabobject('override', new eset_url('/admin/roles/allow.php', array('mode'=>'override')), get_string('allowoverride', 'core_role'));
$toprow[] = new tabobject('switch', new eset_url('/admin/roles/allow.php', array('mode'=>'switch')), get_string('allowswitch', 'core_role'));
$toprow[] = new tabobject('view', new eset_url('/admin/roles/allow.php', ['mode' => 'view']), get_string('allowview', 'core_role'));

echo $OUTPUT->tabtree($toprow, $currenttab);

