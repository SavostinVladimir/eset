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
 * Defines the editing form for the description question type.
 *
 * @package    qtype
 * @subpackage description
 * @copyright  2007 Jamie Pratt
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('ESET_INTERNAL') || die();


/**
 * Description editing form definition.
 *
 * @copyright  2007 Jamie Pratt
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_description_edit_form extends question_edit_form {
    /**
     * Add question-type specific form fields.
     *
     * @param EsetQuickForm $mform the form being built.
     */
    protected function definition_inner($mform) {
        // We don't need this default element.
        $mform->removeElement('defaultmark');
        $mform->addElement('hidden', 'defaultmark', 0);
        $mform->setType('defaultmark', PARAM_RAW);
    }

    public function qtype() {
        return 'description';
    }
}
