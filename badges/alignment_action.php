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
 * Processing actions with alignments.
 *
 * @package    core
 * @subpackage badges
 * @copyright  2018 Tung Thai
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Tung Thai <Tung.ThaiDuc@nashtechglobal.com>
 */
require_once(__DIR__ . '/../config.php');
require_once($CFG->libdir . '/badgeslib.php');

$alignmentid = required_param('alignmentid', PARAM_INT); // Related badge ID.
$badgeid = required_param('id', PARAM_INT); // Badge ID.
$action = optional_param('action', 'remove', PARAM_TEXT); // Remove.

require_login();
$return = new eset_url('/badges/alignment.php', array('id' => $badgeid));
$badge = new badge($badgeid);
$context = $badge->get_context();
require_capability('eset/badges:configuredetails', $context);

if ($action == 'remove') {
    $badge->delete_alignment($alignmentid);
}
redirect($return);
