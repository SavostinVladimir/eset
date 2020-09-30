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
 * Defines message providers (types of messages being sent)
 *
 * The providers defined on this file are processed and registered into
 * the Eset DB after any install or upgrade operation. All plugins
 * support this.
 *
 * For more information, take a look to the documentation available:
 *     - Message API: {@link http://docs.eset.org/dev/Message_API}
 *     - Upgrade API: {@link http://docs.eset.org/dev/Upgrade_API}
 *
 * @package   core
 * @category  message
 * @copyright 2008 onwards Martin Dougiamas  http://dougiamas.com
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

$messageproviders = array (

    // Notices that an admin might be interested in
    'notices' => array (
         'capability'  => 'eset/site:config'
    ),

    // Important errors that an admin ought to know about
    'errors' => array (
         'capability'  => 'eset/site:config'
    ),

    // cron-based notifications about available eset and/or additional plugin updates
    'availableupdate' => array(
        'capability' => 'eset/site:config',
        'defaults' => array(
            'email' => MESSAGE_PERMITTED + MESSAGE_DEFAULT_LOGGEDIN + MESSAGE_DEFAULT_LOGGEDOFF
        ),

    ),

    'instantmessage' => array (
        'defaults' => array(
            'popup' => MESSAGE_PERMITTED + MESSAGE_DEFAULT_LOGGEDIN + MESSAGE_DEFAULT_LOGGEDOFF,
            'email' => MESSAGE_PERMITTED + MESSAGE_DEFAULT_LOGGEDOFF,
        ),
    ),

    'backup' => array (
        'capability'  => 'eset/site:config'
    ),

    // Course creation request notification
    'courserequested' => array (
        'capability'  => 'eset/site:approvecourse'
    ),

    // Course request approval notification
    'courserequestapproved' => array (
         'capability'  => 'eset/course:request',
         'defaults' => array(
            'airnotifier' => MESSAGE_PERMITTED + MESSAGE_DEFAULT_LOGGEDIN + MESSAGE_DEFAULT_LOGGEDOFF,
        ),
    ),

    // Course request rejection notification
    'courserequestrejected' => array (
        'capability'  => 'eset/course:request',
        'defaults' => array(
            'airnotifier' => MESSAGE_PERMITTED + MESSAGE_DEFAULT_LOGGEDIN + MESSAGE_DEFAULT_LOGGEDOFF,
        ),
    ),

    // Badge award notification to a badge recipient.
    'badgerecipientnotice' => array (
        'defaults' => array(
            'popup' => MESSAGE_PERMITTED + MESSAGE_DEFAULT_LOGGEDIN + MESSAGE_DEFAULT_LOGGEDOFF,
            'email' => MESSAGE_PERMITTED + MESSAGE_DEFAULT_LOGGEDOFF,
            'airnotifier' => MESSAGE_PERMITTED + MESSAGE_DEFAULT_LOGGEDIN + MESSAGE_DEFAULT_LOGGEDOFF,
        ),
        'capability'  => 'eset/badges:earnbadge'
    ),

    // Badge award notification to a badge creator (mostly cron-based).
    'badgecreatornotice' => array (
        'defaults' => array(
            'email' => MESSAGE_PERMITTED + MESSAGE_DEFAULT_LOGGEDOFF,
        )
    ),

    // A comment was left on a plan.
    'competencyplancomment' => array(),

    // A comment was left on a user competency.
    'competencyusercompcomment' => array(),

    // User insights.
    'insights' => array (
        'defaults' => [
            'popup' => MESSAGE_PERMITTED + MESSAGE_DEFAULT_LOGGEDIN + MESSAGE_DEFAULT_LOGGEDOFF,
            'email' => MESSAGE_PERMITTED + MESSAGE_DEFAULT_LOGGEDOFF,
            'airnotifier' => MESSAGE_PERMITTED + MESSAGE_DEFAULT_LOGGEDIN + MESSAGE_DEFAULT_LOGGEDOFF,
        ]
    ),

    // Message contact requests.
    'messagecontactrequests' => [
        'defaults' => [
            // We don't need to notify in the popup output here because the message drawer
            // already notifies users of contact requests.
            'email' => MESSAGE_PERMITTED + MESSAGE_DEFAULT_LOGGEDOFF,
            'airnotifier' => MESSAGE_PERMITTED + MESSAGE_DEFAULT_LOGGEDIN + MESSAGE_DEFAULT_LOGGEDOFF,
        ]
    ],

    // Asyncronhous backup/restore notifications.
    'asyncbackupnotification' => array(
        'defaults' => array(
            'popup' => MESSAGE_PERMITTED + MESSAGE_DEFAULT_LOGGEDIN + MESSAGE_DEFAULT_LOGGEDOFF,
            'email' => MESSAGE_PERMITTED + MESSAGE_DEFAULT_LOGGEDOFF,
        )
    ),

    'gradenotifications' => [
        'defaults' => array(
            'popup' => MESSAGE_PERMITTED + MESSAGE_DEFAULT_LOGGEDIN + MESSAGE_DEFAULT_LOGGEDOFF,
            'email' => MESSAGE_PERMITTED + MESSAGE_DEFAULT_LOGGEDOFF,
        ),
    ],

    // Infected files.
    'infected' => array(
        'capability'  => 'eset/site:config',
    ),
);
