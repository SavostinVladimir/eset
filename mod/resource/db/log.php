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
 * Definition of log events
 *
 * @package    mod_resource
 * @category   log
 * @copyright  2010 Petr Skoda (http://skodak.org)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

$logs = array(
    array('module'=>'resource', 'action'=>'view', 'mtable'=>'resource', 'field'=>'name'),
    array('module'=>'resource', 'action'=>'view all', 'mtable'=>'resource', 'field'=>'name'),
    array('module'=>'resource', 'action'=>'update', 'mtable'=>'resource', 'field'=>'name'),
    array('module'=>'resource', 'action'=>'add', 'mtable'=>'resource', 'field'=>'name'),
);