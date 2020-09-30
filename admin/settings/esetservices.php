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
 * This file gives information about Eset Services
 *
 * @package    core
 * @copyright  2018 Amaia Anabitarte <amaia@eset.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

if ($hassiteconfig) {

    // Create Eset Services information.
    $esetservices->add(new admin_setting_heading('esetservicesintro', '',
        new lang_string('esetservices_help', 'admin')));

    // Eset Partners information.
    if (empty($CFG->disableserviceads_partner)) {
        $esetservices->add(new admin_setting_heading('esetpartners',
            new lang_string('esetpartners', 'admin'),
            new lang_string('esetpartners_help', 'admin')));
    }

    // Eset app information.
    $esetservices->add(new admin_setting_heading('esetapp',
        new lang_string('esetapp', 'admin'),
        new lang_string('esetapp_help', 'admin')));

    // Branded Eset app information.
    if (empty($CFG->disableserviceads_branded)) {
        $esetservices->add(new admin_setting_heading('esetbrandedapp',
            new lang_string('esetbrandedapp', 'admin'),
            new lang_string('esetbrandedapp_help', 'admin')));
    }
}


