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
 * Capability definitions for Eset core.
 *
 * The capabilities are loaded into the database table when the module is
 * installed or updated. Whenever the capability definitions are updated,
 * the module version number should be bumped up.
 *
 * The system has four possible values for a capability:
 * CAP_ALLOW, CAP_PREVENT, CAP_PROHIBIT, and inherit (not set).
 *
 *
 * CAPABILITY NAMING CONVENTION
 *
 * It is important that capability names are unique. The naming convention
 * for capabilities that are specific to modules and blocks is as follows:
 *   [mod/block]/<plugin_name>:<capabilityname>
 *
 * component_name should be the same as the directory name of the mod or block.
 *
 * Core eset capabilities are defined thus:
 *    eset/<capabilityclass>:<capabilityname>
 *
 * Examples: mod/forum:viewpost
 *           block/recent_activity:view
 *           eset/site:deleteuser
 *
 * The variable name for the capability definitions array is $capabilities
 *
 * For more information, take a look to the documentation available:
 *     - Access API: {@link http://docs.eset.org/dev/Access_API}
 *     - Upgrade API: {@link http://docs.eset.org/dev/Upgrade_API}
 *
 * @package   core_access
 * @category  access
 * @copyright 2006 onwards Martin Dougiamas  http://dougiamas.com
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

$capabilities = array(
    'eset/site:config' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL | RISK_XSS | RISK_CONFIG | RISK_DATALOSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
        )
    ),
    'eset/site:configview' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW,
            'coursecreator' => CAP_ALLOW,
        )
    ),

    'eset/site:readallmessages' => array(

        'riskbitmask' => RISK_PERSONAL,

        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW
        )
    ),

    'eset/site:manageallmessaging' => array(

        'riskbitmask' => RISK_PERSONAL,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    'eset/site:deleteanymessage' => array(

        'riskbitmask' => RISK_DATALOSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    'eset/site:sendmessage' => array(

        'riskbitmask' => RISK_SPAM,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW,
            'user' => CAP_ALLOW
        )
    ),

    'eset/site:senderrormessage' => [
        'riskbitmask' => RISK_SPAM,
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'user' => CAP_ALLOW
        )
    ],

    'eset/site:deleteownmessage' => array(

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'user' => CAP_ALLOW
        )
    ),

    'eset/site:approvecourse' => array(

        'riskbitmask' => RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSECAT,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    'eset/backup:backupcourse' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL | RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),

        'clonepermissionsfrom' =>  'eset/site:backup'
    ),

    'eset/backup:backupsection' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL | RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),

        'clonepermissionsfrom' =>  'eset/backup:backupcourse'
    ),

    'eset/backup:backupactivity' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL | RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),

        'clonepermissionsfrom' =>  'eset/backup:backupcourse'
    ),

    'eset/backup:backuptargetimport' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL | RISK_XSS,

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),

        'clonepermissionsfrom' =>  'eset/backup:backupcourse'
    ),

    'eset/backup:downloadfile' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL | RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),

        'clonepermissionsfrom' =>  'eset/site:backupdownload'
    ),

    'eset/backup:configure' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL | RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/backup:userinfo' => array(

        'riskbitmask' => RISK_PERSONAL,

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    'eset/backup:anonymise' => array(

        'riskbitmask' => RISK_PERSONAL,

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    'eset/restore:restorecourse' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL | RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),

        'clonepermissionsfrom' =>  'eset/site:restore'
    ),

    'eset/restore:restoresection' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL | RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),

        'clonepermissionsfrom' =>  'eset/restore:restorecourse'
    ),

    'eset/restore:restoreactivity' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL | RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),

        'clonepermissionsfrom' =>  'eset/restore:restorecourse'
    ),

    'eset/restore:viewautomatedfilearea' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL | RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
    ),

    'eset/restore:restoretargetimport' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL | RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),

        'clonepermissionsfrom' =>  'eset/site:import'
    ),

    'eset/restore:uploadfile' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL | RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),

        'clonepermissionsfrom' =>  'eset/site:backupupload'
    ),

    'eset/restore:configure' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL | RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/restore:rolldates' => array(

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'coursecreator' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/restore:userinfo' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL | RISK_XSS | RISK_CONFIG,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    'eset/restore:createuser' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    'eset/site:manageblocks' => array(

        'riskbitmask' => RISK_SPAM | RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_BLOCK,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/site:accessallgroups' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/site:viewanonymousevents' => array(

        'riskbitmask' => RISK_PERSONAL,

        'captype' => 'read',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => array(
            'manager' => CAP_ALLOW,
        )
    ),

    'eset/site:viewfullnames' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    // In reports that give lists of users, extra information about each user's
    // identity (the fields configured in site option showuseridentity) will be
    // displayed to users who have this capability.
    'eset/site:viewuseridentity' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/site:viewreports' => array(

        'riskbitmask' => RISK_PERSONAL,

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/site:trustcontent' => array(

        'riskbitmask' => RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/site:uploadusers' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    // Permission to manage filter setting overrides in subcontexts.
    'eset/filter:manage' => array(

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW,
        )
    ),

    'eset/user:create' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    'eset/user:delete' => array(

        'riskbitmask' => RISK_PERSONAL | RISK_DATALOSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    'eset/user:update' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    'eset/user:viewdetails' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'guest' => CAP_ALLOW,
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/user:viewalldetails' => array(
        'riskbitmask' => RISK_PERSONAL,
        'captype' => 'read',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/user:update'
    ),

    'eset/user:viewlastip' => array(
        'riskbitmask' => RISK_PERSONAL,
        'captype' => 'read',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/user:update'
    ),

    'eset/user:viewhiddendetails' => array(

        'riskbitmask' => RISK_PERSONAL,

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/user:loginas' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL | RISK_XSS | RISK_CONFIG,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    // can the user manage the system default profile page?
    'eset/user:managesyspages' => array(

        'riskbitmap' => RISK_SPAM | RISK_PERSONAL | RISK_CONFIG,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    // can the user manage another user's profile page?
    'eset/user:manageblocks' => array(

        'riskbitmap' => RISK_SPAM | RISK_PERSONAL,

        'captype' => 'write',
        'contextlevel' => CONTEXT_USER
    ),

    // can the user manage their own profile page?
    'eset/user:manageownblocks' => array(

        'riskbitmap' => RISK_SPAM | RISK_PERSONAL,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'user' => CAP_ALLOW
        )
    ),

    // can the user manage their own files?
    'eset/user:manageownfiles' => array(

        'riskbitmap' => RISK_SPAM | RISK_PERSONAL,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'user' => CAP_ALLOW
        )
    ),

    // Can the user ignore the setting userquota?
    // The permissions are cloned from ignorefilesizelimits as it was partly used for that purpose.
    'eset/user:ignoreuserquota' => array(
        'riskbitmap' => RISK_SPAM,
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'clonepermissionsfrom' => 'eset/course:ignorefilesizelimits'
    ),

    // can the user manage the system default dashboard page?
    'eset/my:configsyspages' => array(

        'riskbitmap' => RISK_SPAM | RISK_PERSONAL | RISK_CONFIG,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    'eset/role:assign' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL | RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/role:review' => array(

        'riskbitmask' => RISK_PERSONAL,

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/role:override' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL | RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    'eset/role:safeoverride' => array(

        'riskbitmask' => RISK_SPAM,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW
        )
    ),

    'eset/role:manage' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL | RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    'eset/role:switchroles' => array(

        'riskbitmask' => RISK_XSS | RISK_PERSONAL,

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    // Create, update and delete course categories. (Deleting a course category
    // does not let you delete the courses it contains, unless you also have
    // eset/course: delete.) Creating and deleting requires this permission in
    // the parent category.
    'eset/category:manage' => array(

        'riskbitmask' => RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSECAT,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/category:update'
    ),

    'eset/category:viewcourselist' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSECAT,
        'archetypes' => array(
            'guest' => CAP_ALLOW,
            'user' => CAP_ALLOW,
        )
    ),

    'eset/category:viewhiddencategories' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSECAT,
        'archetypes' => array(
            'coursecreator' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/category:visibility'
    ),

    // create, delete, move cohorts in system and course categories,
    // (cohorts with component !== null can be only moved)
    'eset/cohort:manage' => array(

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSECAT,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    // add and remove cohort members (only for cohorts where component !== null)
    'eset/cohort:assign' => array(

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSECAT,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    // View visible and hidden cohorts defined in the current context.
    'eset/cohort:view' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:create' => array(

        'riskbitmask' => RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSECAT,
        'archetypes' => array(
            'coursecreator' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:creategroupconversations' => array(
        'riskbitmask' => RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:request' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSECAT,
    ),

    'eset/course:delete' => array(

        'riskbitmask' => RISK_DATALOSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:update' => array(

        'riskbitmask' => RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:view' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'manager' => CAP_ALLOW,
        )
    ),

    /* review course enrolments - no group restrictions, it is really full access to all participants info*/
    'eset/course:enrolreview' => array(

        'riskbitmask' => RISK_PERSONAL,

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW,
        )
    ),

    /* add, remove, hide enrol instances in courses */
    'eset/course:enrolconfig' => array(

        'riskbitmask' => RISK_PERSONAL,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW,
        )
    ),

    'eset/course:reviewotherusers' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW,
        ),
        'clonepermissionsfrom' => 'eset/role:assign'
    ),

    'eset/course:bulkmessaging' => array(

        'riskbitmask' => RISK_SPAM,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:viewhiddenuserfields' => array(

        'riskbitmask' => RISK_PERSONAL,

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:viewhiddencourses' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'coursecreator' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:visibility' => array(

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:managefiles' => array(

        'riskbitmask' => RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:ignoreavailabilityrestrictions' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => array(
            'manager' => CAP_ALLOW,
            'coursecreator' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
        ),
        'clonepermissionsfrom' => 'eset/course:viewhiddenactivities'
    ),

    'eset/course:ignorefilesizelimits' => array(

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
        )
    ),

    'eset/course:manageactivities' => array(

        'riskbitmask' => RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:activityvisibility' => array(

        'captype' => 'write',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:viewhiddenactivities' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:viewparticipants' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:changefullname' => array(

        'riskbitmask' => RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/course:update'
    ),

    'eset/course:changeshortname' => array(

        'riskbitmask' => RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/course:update'
    ),

    'eset/course:changelockedcustomfields' => array(

        'riskbitmask' => RISK_SPAM,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
    ),

    'eset/course:configurecustomfields' => array(

        'riskbitmask' => RISK_SPAM,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'clonepermissionsfrom' => 'eset/site:config'
    ),

    'eset/course:renameroles' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/course:update'
    ),

    'eset/course:changeidnumber' => array(

        'riskbitmask' => RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/course:update'
    ),
    'eset/course:changecategory' => array(
        'riskbitmask' => RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/course:update'
    ),

    'eset/course:changesummary' => array(
        'riskbitmask' => RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/course:update'
    ),

    'eset/course:setforcedlanguage' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/course:update'
    ),


    'eset/site:viewparticipants' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:isincompletionreports' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'student' => CAP_ALLOW,
        ),
    ),

    'eset/course:viewscales' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:managescales' => array(

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:managegroups' => array(
        'riskbitmask' => RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:reset' => array(

        'riskbitmask' => RISK_DATALOSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:viewsuspendedusers' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:tag' => array(
        'riskbitmask' => RISK_SPAM,
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'manager' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
        ),
        'clonepermissionsfrom' => 'eset/course:update'
    ),

    'eset/blog:view' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'guest' => CAP_ALLOW,
            'user' => CAP_ALLOW,
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/blog:search' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'guest' => CAP_ALLOW,
            'user' => CAP_ALLOW,
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/blog:viewdrafts' => array(

        'riskbitmask' => RISK_PERSONAL,
        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    'eset/blog:create' => array( // works in CONTEXT_SYSTEM only

        'riskbitmask' => RISK_SPAM,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'user' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/blog:manageentries' => array(

        'riskbitmask' => RISK_SPAM,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/blog:manageexternal' => array(

        'riskbitmask' => RISK_SPAM,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'student' => CAP_ALLOW,
            'user' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/calendar:manageownentries' => array( // works in CONTEXT_SYSTEM only

        'riskbitmask' => RISK_SPAM,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'user' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/calendar:managegroupentries' => array(

        'riskbitmask' => RISK_SPAM,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/calendar:manageentries' => array(

        'riskbitmask' => RISK_SPAM,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/user:editprofile' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL,

        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    'eset/user:editownprofile' => array(

        'riskbitmask' => RISK_SPAM,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'guest' => CAP_PROHIBIT,
            'user' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/user:changeownpassword' => array(

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'guest' => CAP_PROHIBIT,
            'user' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    // The next 3 might make no sense for some roles, e.g teacher, etc.
    // since the next level up is site. These are more for the parent role
    'eset/user:readuserposts' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/user:readuserblogs' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    // designed for parent role - not used in legacy roles
    'eset/user:viewuseractivitiesreport' => array(
        'riskbitmask' => RISK_PERSONAL,

        'captype' => 'read',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
        )
    ),

    //capabilities designed for the new message system configuration
    'eset/user:editmessageprofile' => array(

         'riskbitmask' => RISK_SPAM,

         'captype' => 'write',
         'contextlevel' => CONTEXT_USER,
         'archetypes' => array(
             'manager' => CAP_ALLOW
         )
     ),

     'eset/user:editownmessageprofile' => array(

         'captype' => 'write',
         'contextlevel' => CONTEXT_SYSTEM,
         'archetypes' => array(
             'guest' => CAP_PROHIBIT,
             'user' => CAP_ALLOW,
             'manager' => CAP_ALLOW
         )
     ),

    'eset/question:managecategory' => array(
        'riskbitmask' => RISK_SPAM | RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    //new in eset 1.9
    'eset/question:add' => array(
        'riskbitmask' => RISK_SPAM | RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' =>  'eset/question:manage'
    ),
    'eset/question:editmine' => array(
        'riskbitmask' => RISK_SPAM | RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' =>  'eset/question:manage'
    ),
    'eset/question:editall' => array(
        'riskbitmask' => RISK_SPAM | RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' =>  'eset/question:manage'
    ),
    'eset/question:viewmine' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' =>  'eset/question:manage'
    ),
    'eset/question:viewall' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' =>  'eset/question:manage'
    ),
    'eset/question:usemine' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' =>  'eset/question:manage'
    ),
    'eset/question:useall' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' =>  'eset/question:manage'
    ),
    'eset/question:movemine' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' =>  'eset/question:manage'
    ),
    'eset/question:moveall' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' =>  'eset/question:manage'
    ),
    //END new in eset 1.9

    // Configure the installed question types.
    'eset/question:config' => array(
        'riskbitmask' => RISK_CONFIG,
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    // While attempting questions, the ability to flag particular questions for later reference.
    'eset/question:flag' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    // Controls whether the user can tag his own questions.
    'eset/question:tagmine' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/question:editmine'
    ),

    // Controls whether the user can tag all questions.
    'eset/question:tagall' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/question:editall'
    ),

    'eset/site:doclinks' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:sectionvisibility' => array(

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:useremail' => array(

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:viewhiddensections' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:setcurrentsection' => array(

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/course:movesections' => array(

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/course:update'
    ),

    'eset/site:mnetlogintoremote' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
        )
    ),

    'eset/grade:viewall' => array(
        'riskbitmask' => RISK_PERSONAL,
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE, // and CONTEXT_USER
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/course:viewcoursegrades'
    ),

    'eset/grade:view' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'student' => CAP_ALLOW
        )
    ),

    'eset/grade:viewhidden' => array(
        'riskbitmask' => RISK_PERSONAL,
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/course:viewcoursegrades'
    ),

    'eset/grade:import' => array(
        'riskbitmask' => RISK_PERSONAL | RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/course:managegrades'
    ),

    'eset/grade:export' => array(
        'riskbitmask' => RISK_PERSONAL,
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/course:managegrades'
    ),

    'eset/grade:manage' => array(
        'riskbitmask' => RISK_PERSONAL | RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/course:managegrades'
    ),

    'eset/grade:edit' => array(
        'riskbitmask' => RISK_PERSONAL | RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/course:managegrades'
    ),

    // ability to define advanced grading forms in activities either from scratch
    // or from a shared template
    'eset/grade:managegradingforms' => array(
        'riskbitmask' => RISK_PERSONAL | RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/course:managegrades'
    ),

    // ability to save a grading form as a new shared template and eventually edit
    // and remove own templates (templates originally shared by that user)
    'eset/grade:sharegradingforms' => array(
        'riskbitmask' => RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
    ),

    // ability to edit and remove any shared template, even those originally shared
    // by other users
    'eset/grade:managesharedforms' => array(
        'riskbitmask' => RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
    ),

    'eset/grade:manageoutcomes' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/course:managegrades'
    ),

    'eset/grade:manageletters' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/course:managegrades'
    ),

    'eset/grade:hide' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/grade:lock' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/grade:unlock' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/my:manageblocks' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'user' => CAP_ALLOW
        )
    ),

    'eset/notes:view' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/notes:manage' => array(
        'riskbitmask' => RISK_SPAM,

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/tag:manage' => array(
        'riskbitmask' => RISK_SPAM,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    'eset/tag:edit' => array(
        'riskbitmask' => RISK_SPAM,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),

    'eset/tag:flag' => array(
        'riskbitmask' => RISK_SPAM,

        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'user' => CAP_ALLOW
        )
    ),

    'eset/tag:editblocks' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/block:view' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_BLOCK,
        'archetypes' => array(
            'guest' => CAP_ALLOW,
            'user' => CAP_ALLOW,
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
        )
    ),

    'eset/block:edit' => array(
        'riskbitmask' => RISK_SPAM | RISK_XSS,

        'captype' => 'write',
        'contextlevel' => CONTEXT_BLOCK,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'eset/portfolio:export' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'user' => CAP_ALLOW,
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
        )
    ),
    'eset/comment:view' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'frontpage' => CAP_ALLOW,
            'guest' => CAP_ALLOW,
            'user' => CAP_ALLOW,
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),
    'eset/comment:post' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL,
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'user' => CAP_ALLOW,
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),
    'eset/comment:delete' => array(

        'riskbitmask' => RISK_DATALOSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),
    'eset/webservice:createtoken' => array(

        'riskbitmask' => RISK_CONFIG | RISK_DATALOSS | RISK_SPAM | RISK_PERSONAL | RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),
    'eset/webservice:managealltokens' => array(

        'riskbitmask' => RISK_CONFIG | RISK_DATALOSS | RISK_PERSONAL,
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array()
    ),
    'eset/webservice:createmobiletoken' => array(

        'riskbitmask' => RISK_SPAM | RISK_PERSONAL,
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'user' => CAP_ALLOW
        )
    ),
    'eset/rating:view' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'user' => CAP_ALLOW,
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),
    'eset/rating:viewany' => array(

        'riskbitmask' => RISK_PERSONAL,
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'user' => CAP_ALLOW,
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),
    'eset/rating:viewall' => array(

        'riskbitmask' => RISK_PERSONAL,
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'user' => CAP_ALLOW,
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),
    'eset/rating:rate' => array(

        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'user' => CAP_ALLOW,
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),
    'eset/course:markcomplete' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),
    'eset/course:overridecompletion' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    // Badges.
    'eset/badges:manageglobalsettings' => array(
        'riskbitmask'  => RISK_DATALOSS | RISK_CONFIG,
        'captype'      => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes'   => array(
            'manager'       => CAP_ALLOW,
        )
    ),

    // View available badges without earning them.
    'eset/badges:viewbadges' => array(
        'captype'       => 'read',
        'contextlevel'  => CONTEXT_COURSE,
        'archetypes'    => array(
            'user'          => CAP_ALLOW,
        )
    ),

    // Manage badges on own private badges page.
    'eset/badges:manageownbadges' => array(
        'riskbitmap'    => RISK_SPAM,
        'captype'       => 'write',
        'contextlevel'  => CONTEXT_USER,
        'archetypes'    => array(
            'user'    => CAP_ALLOW
        )
    ),

    // View public badges in other users' profiles.
    'eset/badges:viewotherbadges' => array(
        'riskbitmap'    => RISK_PERSONAL,
        'captype'       => 'read',
        'contextlevel'  => CONTEXT_USER,
        'archetypes'    => array(
            'user'    => CAP_ALLOW
        )
    ),

    // Earn badge.
    'eset/badges:earnbadge' => array(
        'captype'       => 'write',
        'contextlevel'  => CONTEXT_COURSE,
        'archetypes'    => array(
            'user'           => CAP_ALLOW,
        )
    ),

    // Create/duplicate badges.
    'eset/badges:createbadge' => array(
        'riskbitmask'  => RISK_SPAM,
        'captype'      => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes'   => array(
            'manager'        => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
        )
    ),

    // Delete badges.
    'eset/badges:deletebadge' => array(
        'riskbitmask'  => RISK_DATALOSS,
        'captype'      => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes'   => array(
            'manager'        => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
        )
    ),

    // Set up/edit badge details.
    'eset/badges:configuredetails' => array(
        'riskbitmask'  => RISK_SPAM,
        'captype'      => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes'   => array(
            'manager'        => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
        )
    ),

    // Set up/edit criteria of earning a badge.
    'eset/badges:configurecriteria' => array(
        'riskbitmask'  => RISK_XSS,
        'captype'      => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes'   => array(
            'manager'        => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
        )
    ),

    // Configure badge messages.
    'eset/badges:configuremessages' => array(
        'riskbitmask'  => RISK_SPAM,
        'captype'      => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes'   => array(
            'manager'        => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
        )
    ),

    // Award badge to a user.
    'eset/badges:awardbadge' => array(
        'riskbitmask'  => RISK_SPAM,
        'captype'      => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes'   => array(
            'manager'        => CAP_ALLOW,
            'teacher'        => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
        )
    ),

    // Revoke badge from a user.
    'eset/badges:revokebadge' => array(
        'riskbitmask'  => RISK_SPAM,
        'captype'      => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes'   => array(
            'manager'        => CAP_ALLOW,
            'teacher'        => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
        )
    ),

    // View users who earned a specific badge without being able to award a badge.
    'eset/badges:viewawarded' => array(
        'riskbitmask'  => RISK_PERSONAL,
        'captype'      => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes'   => array(
                'manager'        => CAP_ALLOW,
                'teacher'        => CAP_ALLOW,
                'editingteacher' => CAP_ALLOW,
        )
    ),

    'eset/site:forcelanguage' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
        )
    ),

    // Perform site-wide search queries through the search API.
    'eset/search:query' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'guest' => CAP_ALLOW,
            'user' => CAP_ALLOW,
            'student' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    // Competencies.
    'eset/competency:competencymanage' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSECAT,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),
    'eset/competency:competencyview' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSECAT,
        'archetypes' => array(
            'user' => CAP_ALLOW
        ),
    ),
    'eset/competency:competencygrade' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE, // And CONTEXT_USER.
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'teacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
    ),
    // Course competencies.
    'eset/competency:coursecompetencymanage' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
    ),
    'eset/competency:coursecompetencyconfigure' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
    ),
    'eset/competency:coursecompetencygradable' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'student' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'eset/course:isincompletionreports'
    ),
    'eset/competency:coursecompetencyview' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'user' => CAP_ALLOW
        ),
    ),
    // Evidence.
    'eset/competency:evidencedelete' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
        ),
        'clonepermissionsfrom' => 'eset/site:config'
    ),
    // User plans.
    'eset/competency:planmanage' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
    ),
    'eset/competency:planmanagedraft' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
    ),
    'eset/competency:planmanageown' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
        ),
    ),
    'eset/competency:planmanageowndraft' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
        ),
    ),
    'eset/competency:planview' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
    ),
    'eset/competency:planviewdraft' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
    ),
    'eset/competency:planviewown' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'user' => CAP_ALLOW
        ),
    ),
    'eset/competency:planviewowndraft' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
        ),
    ),
    'eset/competency:planrequestreview' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),
    'eset/competency:planrequestreviewown' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'user' => CAP_ALLOW
        )
    ),
    'eset/competency:planreview' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
    ),
    'eset/competency:plancomment' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
    ),
    'eset/competency:plancommentown' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'user' => CAP_ALLOW
        ),
    ),
    // User competencies.
    'eset/competency:usercompetencyview' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_USER,     // And CONTEXT_COURSE.
        'archetypes' => array(
            'manager' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'teacher' => CAP_ALLOW
        )
    ),
    'eset/competency:usercompetencyrequestreview' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),
    'eset/competency:usercompetencyrequestreviewown' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'user' => CAP_ALLOW
        )
    ),
    'eset/competency:usercompetencyreview' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
    ),
    'eset/competency:usercompetencycomment' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
    ),
    'eset/competency:usercompetencycommentown' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'user' => CAP_ALLOW
        ),
    ),
    // Template.
    'eset/competency:templatemanage' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSECAT,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
    ),
    'eset/analytics:listinsights' => array(
        'riskbitmask' => RISK_PERSONAL,
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),
    'eset/analytics:managemodels' => array(
        'riskbitmask' => RISK_CONFIG,
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
    ),
    'eset/competency:templateview' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSECAT,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
    ),
    // User evidence.
    'eset/competency:userevidencemanage' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
    ),
    'eset/competency:userevidencemanageown' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'user' => CAP_ALLOW
        ),
    ),
    'eset/competency:userevidenceview' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
    ),
    'eset/site:maintenanceaccess' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
        )
    ),
    // Allow message any user, regardlesss of the privacy preferences for messaging.
    'eset/site:messageanyuser' => array(
        'riskbitmask' => RISK_SPAM,
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    // Context locking/unlocking.
    'eset/site:managecontextlocks' => [
        'captype' => 'write',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => [
        ],
    ],

    // Manual completion toggling.
    'eset/course:togglecompletion' => [
        'captype' => 'write',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => [
            'user' => CAP_ALLOW,
        ],
    ],

    'eset/analytics:listowninsights' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'user' => CAP_ALLOW
        )
    ),

    // Set display option buttons to an H5P content.
    'eset/h5p:setdisplayoptions' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
        )
    ),

    // Allow to deploy H5P content.
    'eset/h5p:deploy' => array(
        'riskbitmask' => RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => array(
            'manager'        => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
        )
    ),

    // Allow to update H5P content-type libraries.
    'eset/h5p:updatelibraries' => [
        'riskbitmask' => RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => [
            'manager' => CAP_ALLOW,
        ]
    ],

    // Allow users to recommend activities in the activity chooser.
    'eset/course:recommendactivity' => [
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => [
            'manager' => CAP_ALLOW,
        ]
    ],

    // Content bank capabilities.
    'eset/contentbank:access' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'manager' => CAP_ALLOW,
            'coursecreator' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
        )
    ),

    'eset/contentbank:upload' => array(
        'riskbitmask' => RISK_SPAM,
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'manager' => CAP_ALLOW,
            'coursecreator' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
        )
    ),

    // Delete any content from the content bank.
    'eset/contentbank:deleteanycontent' => [
        'riskbitmask' => RISK_DATALOSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => [
            'manager' => CAP_ALLOW,
            'coursecreator' => CAP_ALLOW,
        ]
    ],

    // Delete content created by yourself.
    'eset/contentbank:deleteowncontent' => [
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => [
            'user' => CAP_ALLOW,
        ]
    ],

    // Manage (rename, move, publish, share, etc.) any content from the content bank.
    'eset/contentbank:manageanycontent' => [
        'riskbitmask' => RISK_DATALOSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'manager' => CAP_ALLOW,
            'coursecreator' => CAP_ALLOW,
        )
    ],

    // Manage (rename, move, publish, share, etc.) content created by yourself.
    'eset/contentbank:manageowncontent' => [
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'manager' => CAP_ALLOW,
            'coursecreator' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
        )
    ],

    // Allow users to create/edit content within the content bank.
    'eset/contentbank:useeditor' => [
        'riskbitmask' => RISK_SPAM,
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'manager' => CAP_ALLOW,
            'coursecreator' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
        )
    ],

    // Allow users to download content.
    'eset/contentbank:downloadcontent' => [
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => [
            'manager' => CAP_ALLOW,
            'coursecreator' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
        ]
    ],
);
