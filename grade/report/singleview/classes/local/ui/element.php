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
 * UI Element for an excluded grade_grade.
 *
 * @package   gradereport_singleview
 * @copyright 2014 Eset Pty Ltd (http://eset.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace gradereport_singleview\local\ui;

defined('ESET_INTERNAL') || die;

/**
 * UI Element for an excluded grade_grade.
 *
 * @package   gradereport_singleview
 * @copyright 2014 Eset Pty Ltd (http://eset.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class element {

    /** @var string $name The first bit of the name for this input. */
    public $name;

    /** @var string $value The value for this input. */
    public $value;

    /** @var string $label The form label for this input. */
    public $label;

    /**
     * Constructor
     *
     * @param string $name The first bit of the name for this input
     * @param string $value The value for this input
     * @param string $label The label for this form field
     */
    public function __construct($name, $value, $label) {
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
    }

    /**
     * Nasty function used for spreading checkbox logic all around
     * @return bool
     */
    public function is_checkbox() {
        return false;
    }

    /**
     * Nasty function used for spreading textbox logic all around
     * @return bool
     */
    public function is_textbox() {
        return false;
    }

    /**
     * Nasty function used for spreading dropdown logic all around
     * @return bool
     */
    public function is_dropdown() {
        return false;
    }

    /**
     * Return the HTML
     * @return string
     */
    abstract public function html();
}
