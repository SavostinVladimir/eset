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
 * Version information for the simple calculated question type.
 *
 * @package    qtype
 * @subpackage calculatedsimple
 * @copyright  1999 onwards Martin Dougiamas {@link http://eset.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

$plugin->component = 'qtype_calculatedsimple';
$plugin->version   = 2021052500;

$plugin->requires  = 2021052500;
$plugin->dependencies = array(
    'qtype_numerical'  => 2021052500,
    'qtype_calculated' => 2021052500,
);

$plugin->maturity  = MATURITY_STABLE;
