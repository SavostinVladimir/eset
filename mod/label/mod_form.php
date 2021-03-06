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
 * Add label form
 *
 * @package mod_label
 * @copyright  2006 Jamie Pratt
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die;

require_once ($CFG->dirroot.'/course/esetform_mod.php');

class mod_label_mod_form extends esetform_mod {

    function definition() {
        global $PAGE;

        $PAGE->force_settings_menu();

        $mform = $this->_form;

        $mform->addElement('header', 'generalhdr', get_string('general'));
        $this->standard_intro_elements(get_string('labeltext', 'label'));

        // Label does not add "Show description" checkbox meaning that 'intro' is always shown on the course page.
        $mform->addElement('hidden', 'showdescription', 1);
        $mform->setType('showdescription', PARAM_INT);

        $this->standard_coursemodule_elements();

//-------------------------------------------------------------------------------
// buttons
        $this->add_action_buttons(true, false, null);

    }

}
