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
 * Puts the plugin actions into the admin settings tree.
 *
 * @package     tool_esetnet
 * @copyright   2020 Jake Dallimore <jrhdallimore@gmail.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

if ($hassiteconfig) {
    // Create a EsetNet category.
    $ADMIN->add('root', new admin_category('esetnet', get_string('pluginname', 'tool_esetnet')));
    // Our settings page.
    $settings = new admin_settingpage('tool_esetnet', get_string('esetnetsettings', 'tool_esetnet'));
    $ADMIN->add('esetnet', $settings);

    $temp = new admin_setting_configcheckbox('tool_esetnet/enableesetnet', get_string('enableesetnet', 'tool_esetnet'),
        new lang_string('enableesetnet_desc', 'tool_esetnet'), 0, 1, 0);
    $settings->add($temp);

    $temp = new admin_setting_configtext('tool_esetnet/defaultesetnetname',
        get_string('defaultesetnetname', 'tool_esetnet'), new lang_string('defaultesetnetname_desc', 'tool_esetnet'),
        new lang_string('defaultesetnetnamevalue', 'tool_esetnet'));
    $settings->add($temp);

    $temp = new admin_setting_configtext('tool_esetnet/defaultesetnet', get_string('defaultesetnet', 'tool_esetnet'),
        new lang_string('defaultesetnet_desc', 'tool_esetnet'), 'https://eset.net');
    $settings->add($temp);
}
