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
 * Edit course tags form
 *
 * @package    core_course
 * @copyright  2015 Marina Glancy
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

require_once($CFG->libdir.'/formslib.php');

/**
 * Edit course tags form
 *
 * @package    core_course
 * @copyright  2015 Marina Glancy
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class coursetags_form extends esetform {

    /**
     * Form definition
     */
    public function definition() {
        $mform    = $this->_form;

        $mform->addElement('tags', 'tags', get_string('tags'),
                    array('itemtype' => 'course', 'component' => 'core'));

        $mform->addElement('hidden', 'id', null);
        $mform->setType('id', PARAM_INT);

        $this->add_action_buttons();

    }
}
