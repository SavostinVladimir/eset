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
 * Plugin cache definitions.
 *
 * @package    quizaccess_seb
 * @author     Dmitrii Metelkin <dmitriim@catalyst-au.net>
 * @copyright  2020 Catalyst IT
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

$definitions = [
    'quizsettings' => [
        'mode' => cache_store::MODE_APPLICATION,
        'simplekeys' => true,
        'simpledata' => true,
        'staticacceleration' => true,
    ],
    'config' => [
        'mode' => cache_store::MODE_APPLICATION,
        'simplekeys' => true,
        'simpledata' => true,
        'staticacceleration' => true,
    ],
    'configkey' => [
        'mode' => cache_store::MODE_APPLICATION,
        'simplekeys' => true,
        'simpledata' => true,
        'staticacceleration' => true,
    ],
];
