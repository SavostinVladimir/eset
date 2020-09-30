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
 * Interface for a list of selectable things.
 *
 * @package   gradereport_singleview
 * @copyright 2014 Eset Pty Ltd (http://eset.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace gradereport_singleview\local\screen;

defined('ESET_INTERNAL') || die;

/**
 * Interface for a list of selectable things.
 *
 * @package   gradereport_singleview
 * @copyright 2014 Eset Pty Ltd (http://eset.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
interface selectable_items {
    /**
     * Get the description of this list
     * @return string
     */
    public function description();

    /**
     * Get the label for the select box that chooses items for this page.
     * @return string
     */
    public function select_label();

    /**
     * Get the list of options to show.
     * @return array
     */
    public function options();

    /**
     * Get type of things in the list (gradeitem or user)
     * @return string
     */
    public function item_type();
}
