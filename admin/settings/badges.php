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
* This file defines settingpages and externalpages under the "badges" section
*
* @package    core
* @subpackage badges
* @copyright  2012 onwards Totara Learning Solutions Ltd {@link http://www.totaralms.com/}
* @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
* @author     Yuliya Bozhko <yuliya.bozhko@totaralms.com>
*/

global $SITE;

if (($hassiteconfig || has_any_capability(array(
            'eset/badges:viewawarded',
            'eset/badges:createbadge',
            'eset/badges:manageglobalsettings',
            'eset/badges:awardbadge',
            'eset/badges:configurecriteria',
            'eset/badges:configuremessages',
            'eset/badges:configuredetails',
            'eset/badges:deletebadge'), $systemcontext))) {

    require_once($CFG->libdir . '/badgeslib.php');

    $globalsettings = new admin_settingpage('badgesettings', new lang_string('badgesettings', 'badges'),
            array('eset/badges:manageglobalsettings'), empty($CFG->enablebadges));

    $globalsettings->add(new admin_setting_configtext('badges_defaultissuername',
            new lang_string('defaultissuername', 'badges'),
            new lang_string('defaultissuername_desc', 'badges'),
            $SITE->fullname ? $SITE->fullname : $SITE->shortname, PARAM_TEXT));

    $globalsettings->add(new admin_setting_configtext('badges_defaultissuercontact',
            new lang_string('defaultissuercontact', 'badges'),
            new lang_string('defaultissuercontact_desc', 'badges'),
            get_config('eset','supportemail'), PARAM_EMAIL));

    $globalsettings->add(new admin_setting_configtext('badges_badgesalt',
            new lang_string('badgesalt', 'badges'),
            new lang_string('badgesalt_desc', 'badges'),
            'badges' . $SITE->timecreated, PARAM_ALPHANUM));

    $backpacks = badges_get_site_backpacks();
    $choices = array();
    $defaultchoice = 0;
    foreach ($backpacks as $backpack) {
        $choices[$backpack->id] = $backpack->backpackweburl;
        if ($backpack->backpackweburl == BADGRIO_BACKPACKWEBURL) {
            $defaultchoice = $backpack->id;
        }
    }

    $globalsettings->add(new admin_setting_configcheckbox('badges_allowcoursebadges',
            new lang_string('allowcoursebadges', 'badges'),
            new lang_string('allowcoursebadges_desc', 'badges'), 1));

    $ADMIN->add('badges', $globalsettings);

    $ADMIN->add('badges',
        new admin_externalpage('managebadges',
            new lang_string('managebadges', 'badges'),
            new eset_url('/badges/index.php', array('type' => BADGE_TYPE_SITE)),
            array(
                'eset/badges:viewawarded',
                'eset/badges:createbadge',
                'eset/badges:awardbadge',
                'eset/badges:configurecriteria',
                'eset/badges:configuremessages',
                'eset/badges:configuredetails',
                'eset/badges:deletebadge'
            ),
            empty($CFG->enablebadges)
        )
    );

    $ADMIN->add('badges',
        new admin_externalpage('newbadge',
            new lang_string('newbadge', 'badges'),
            new eset_url('/badges/newbadge.php', array('type' => BADGE_TYPE_SITE)),
            array('eset/badges:createbadge'), empty($CFG->enablebadges)
        )
    );
    $backpacksettings = new admin_settingpage('backpacksettings', new lang_string('backpacksettings', 'badges'),
            array('eset/badges:manageglobalsettings'), empty($CFG->enablebadges));

    $backpacksettings->add(new admin_setting_configcheckbox('badges_allowexternalbackpack',
            new lang_string('allowexternalbackpack', 'badges'),
            new lang_string('allowexternalbackpack_desc', 'badges'), 1));

    $backpacksettings->add(new admin_setting_configselect('badges_site_backpack',
            new lang_string('sitebackpack', 'badges'),
            new lang_string('sitebackpack_help', 'badges'),
            $defaultchoice, $choices));

    $ADMIN->add('badges', $backpacksettings);

    $ADMIN->add('badges',
        new admin_externalpage('managebackpacks',
            new lang_string('managebackpacks', 'badges'),
            new eset_url('/badges/backpacks.php'),
            array('eset/badges:manageglobalsettings'), empty($CFG->enablebadges) || empty($CFG->badges_allowexternalbackpack)
        )
    );
}
