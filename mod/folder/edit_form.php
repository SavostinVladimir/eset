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
 * A eset form to manage folder files
 *
 * @package   mod_folder
 * @copyright 2010 Dongsheng Cai <dongsheng@eset.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

require_once("$CFG->libdir/formslib.php");

class mod_folder_edit_form extends esetform {
    function definition() {
        $mform = $this->_form;

        $data    = $this->_customdata['data'];
        $options = $this->_customdata['options'];

        $mform->addElement('hidden', 'id', $data->id);
        $mform->setType('id', PARAM_INT);
        $mform->addElement('filemanager', 'files_filemanager', get_string('files'), null, $options);
        $submit_string = get_string('savechanges');
        $this->add_action_buttons(true, $submit_string);

        $this->set_data($data);
    }
}