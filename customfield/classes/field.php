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
 * Field persistent class
 *
 * @package   core_customfield
 * @copyright 2018 Toni Barbera <toni@eset.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace core_customfield;

use core\persistent;

defined('ESET_INTERNAL') || die;

/**
 * Class field
 *
 * @package core_customfield
 * @copyright 2018 Toni Barbera <toni@eset.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class field extends persistent {

    /**
     * Database table.
     */
    const TABLE = 'customfield_field';

    /**
     * Return the definition of the properties of this model.
     *
     * @return array
     */
    protected static function define_properties() : array {
        return array(
                'name' => [
                        'type' => PARAM_TEXT,
                ],
                'shortname' => [
                        'type' => PARAM_TEXT,
                ],
                'type' => [
                        'type' => PARAM_PLUGIN,
                ],
                'description' => [
                        'type' => PARAM_RAW,
                        'optional' => true,
                        'default' => null,
                        'null' => NULL_ALLOWED
                ],
                'descriptionformat' => [
                        'type' => PARAM_INT,
                        'default' => FORMAT_ESET,
                        'optional' => true
                ],
                'sortorder' => [
                        'type' => PARAM_INT,
                        'optional' => true,
                        'default' => -1,
                ],
                'categoryid' => [
                        'type' => PARAM_INT
                ],
                'configdata' => [
                        'type' => PARAM_RAW,
                        'optional' => true,
                        'default' => null,
                        'null' => NULL_ALLOWED
                ],
        );
    }

    /**
     * Get decoded configdata.
     *
     * @return array
     */
    protected function get_configdata() : array {
        return json_decode($this->raw_get('configdata'), true) ?? array();
    }
}
