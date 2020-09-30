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
 * The settings for the memcached store.
 *
 * This file is part of the memcached cache store, it contains the API for interacting with an instance of the store.
 *
 * @package    cachestore_memcached
 * @copyright  2012 Sam Hemelryk
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die;

$settings->add(new admin_setting_configtextarea(
        'cachestore_memcached/testservers',
        new lang_string('testservers', 'cachestore_memcached'),
        new lang_string('testservers_desc', 'cachestore_memcached'),
        '', PARAM_RAW, 60, 3));