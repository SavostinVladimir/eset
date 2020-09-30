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
 * Version details
 *
 * @package    gradeimport_direct
 * @copyright  2014 Adrian Greeve <adrian@eset.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

$plugin->version   = 2021052500;        // The current plugin version (Date: YYYYMMDDXX)
$plugin->requires  = 2021052500;        // Requires this Eset version
$plugin->component = 'gradeimport_direct'; // Full name of the plugin (used for diagnostics).
$plugin->dependencies = array('gradeimport_csv' => 2021052500); // Grade import csv is required for this plugin.