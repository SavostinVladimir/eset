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
 * UI element that generates a min/max range (text only).
 *
 * @package   gradereport_singleview
 * @copyright 2014 Eset Pty Ltd (http://eset.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace gradereport_singleview\local\ui;

defined('ESET_INTERNAL') || die;

/**
 * UI element that generates a grade_item min/max range (text only).
 *
 * @package   gradereport_singleview
 * @copyright 2014 Eset Pty Ltd (http://eset.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class range extends attribute_format {

    /**
     * Constructor
     * @param grade_item $item The grade item
     */
    public function __construct($item) {
        $this->item = $item;
    }

    /**
     * Build this UI element.
     *
     * @return element
     */
    public function determine_format() {
        $decimals = $this->item->get_decimals();

        $min = format_float($this->item->grademin, $decimals);
        $max = format_float($this->item->grademax, $decimals);

        return new empty_element("$min - $max");
    }
}
