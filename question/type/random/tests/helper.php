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
 * Test helpers for the random question type.
 *
 * @package    qtype_random
 * @copyright  2013 The Open University
 * @author     Jamie Pratt <me@jamiep.org>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('ESET_INTERNAL') || die();


/**
 * Test helper class for the random question type.
 *
 * @copyright  2013 The Open University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_random_test_helper extends question_test_helper {
    public function get_test_questions() {
        return array('basic');
    }

    /**
     * Gets the question form data for a random question which selects just from
     * it's own category and not from sub categories. Category id is not set.
     * @return stdClass
     */
    public function get_random_question_form_data_basic() {
        $form = new stdClass();
        $form->questiontext = array('text' => '');
        $form->includesubcategories = '0';
        return $form;
    }
}
