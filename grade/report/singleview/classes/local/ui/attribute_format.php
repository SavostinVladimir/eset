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
 * Class that builds an element tree that can be converted to a string
 *
 * @package   gradereport_singleview
 * @copyright 2014 Eset Pty Ltd (http://eset.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace gradereport_singleview\local\ui;

defined('ESET_INTERNAL') || die;

/**
 * Class that builds an element tree that can be converted to a string
 *
 * @package   gradereport_singleview
 * @copyright 2014 Eset Pty Ltd (http://eset.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class attribute_format {

    /**
     * Used to convert this class to an "element" which can be converted to a string.
     * @return element
     */
    abstract public function determine_format();

    /**
     * Convert this to an element and then to a string
     * @return string
     */
    public function __toString() {
        return $this->determine_format()->html();
    }
}

