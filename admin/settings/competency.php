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
 * File.
 *
 * @package    core_competency
 * @copyright  2016 Frédéric Massart - FMCorz.net
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

// Save processing when the user will not be able to access anything.
if (has_capability('eset/site:config', $systemcontext)) {

    $parentname = 'competencies';

    // Settings page.
    $settings = new admin_settingpage('competencysettings', new lang_string('competenciessettings', 'core_competency'),
        'eset/site:config', false);
    $ADMIN->add($parentname, $settings);

    // Load the full tree of settings.
    if ($ADMIN->fulltree) {
        $setting = new admin_setting_configcheckbox('core_competency/enabled',
            new lang_string('enablecompetencies', 'core_competency'),
            new lang_string('enablecompetencies_desc', 'core_competency'), 1);
        $settings->add($setting);

        $setting = new admin_setting_configcheckbox('core_competency/pushcourseratingstouserplans',
            new lang_string('pushcourseratingstouserplans', 'core_competency'),
            new lang_string('pushcourseratingstouserplans_desc', 'core_competency'), 1);
        $settings->add($setting);
    }

}
