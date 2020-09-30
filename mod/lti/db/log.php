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
 * LTI web service endpoints
 *
 * @package    mod_lti
 * @category   log
 * @copyright  Copyright (c) 2011 Esetrooms Inc. (http://www.esetrooms.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Chris Scribner
 */

defined('ESET_INTERNAL') || die();

$logs = array(
    array('module' => 'lti', 'action' => 'view', 'mtable' => 'lti', 'field' => 'name'),
    array('module' => 'lti', 'action' => 'launch', 'mtable' => 'lti', 'field' => 'name'),
    array('module' => 'lti', 'action' => 'view all', 'mtable' => 'lti', 'field' => 'name')
);