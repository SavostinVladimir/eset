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
 * form for bulk user multi cohort add
 *
 * @package    core
 * @subpackage user
 * @copyright  2011 Petr Skoda (http://skodak.org)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('ESET_INTERNAL') || die();

require_once($CFG->libdir.'/formslib.php');

class user_bulk_cohortadd_form extends esetform {
    function definition() {
        $mform = $this->_form;
        $cohorts = $this->_customdata;

        $mform->addElement('select', 'cohort', get_string('cohort', 'core_cohort'), $cohorts);
        $mform->addRule('cohort', get_string('required'), 'required', null, 'client');

        $this->add_action_buttons(true, get_string('bulkadd', 'core_cohort'));
    }
}
