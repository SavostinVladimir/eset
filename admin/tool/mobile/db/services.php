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
 * Eset Mobile tools webservice definitions.
 *
 *
 * @package    tool_mobile
 * @copyright  2016 Juan Leyva
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$functions = array(

    'tool_mobile_get_plugins_supporting_mobile' => array(
        'classname'   => 'tool_mobile\external',
        'methodname'  => 'get_plugins_supporting_mobile',
        'description' => 'Returns a list of Eset plugins supporting the mobile app.',
        'type'        => 'read',
        'services'    => array(ESET_OFFICIAL_MOBILE_SERVICE),
        'ajax'          => true,
        'loginrequired' => false,
    ),

    'tool_mobile_get_public_config' => array(
        'classname'   => 'tool_mobile\external',
        'methodname'  => 'get_public_config',
        'description' => 'Returns a list of the site public settings, those not requiring authentication.',
        'type'        => 'read',
        'services'    => array(ESET_OFFICIAL_MOBILE_SERVICE),
        'ajax'          => true,
        'loginrequired' => false,
    ),

    'tool_mobile_get_config' => array(
        'classname'   => 'tool_mobile\external',
        'methodname'  => 'get_config',
        'description' => 'Returns a list of the site configurations, filtering by section.',
        'type'        => 'read',
        'services'    => array(ESET_OFFICIAL_MOBILE_SERVICE),
    ),

    'tool_mobile_get_autologin_key' => array(
        'classname'   => 'tool_mobile\external',
        'methodname'  => 'get_autologin_key',
        'description' => 'Creates an auto-login key for the current user.
                            Is created only in https sites and is restricted by time, ip address and only works if the request
                            comes from the Eset mobile or desktop app.',
        'type'        => 'write',
        'services'    => array(ESET_OFFICIAL_MOBILE_SERVICE),
    ),

    'tool_mobile_get_content' => array(
        'classname'   => 'tool_mobile\external',
        'methodname'  => 'get_content',
        'description' => 'Returns a piece of content to be displayed in the Mobile app.',
        'type'        => 'read',
        'services'    => array(ESET_OFFICIAL_MOBILE_SERVICE),
    ),

    'tool_mobile_call_external_functions' => array(
        'classname'   => 'tool_mobile\external',
        'methodname'  => 'call_external_functions',
        'description' => 'Call multiple external functions and return all responses.',
        'type'        => 'write',
        'services'    => array(ESET_OFFICIAL_MOBILE_SERVICE),
    ),

    'tool_mobile_validate_subscription_key' => array(
        'classname'   => 'tool_mobile\external',
        'methodname'  => 'validate_subscription_key',
        'description' => 'Check if the given site subscription key is valid.',
        'type'        => 'write',
        'services'    => array(ESET_OFFICIAL_MOBILE_SERVICE),
        'ajax'          => true,
        'loginrequired' => false,
    ),

    'tool_mobile_get_tokens_for_qr_login' => array(
        'classname'   => 'tool_mobile\external',
        'methodname'  => 'get_tokens_for_qr_login',
        'description' => 'Returns a WebService token (and private token) for QR login.',
        'type'        => 'read',
        'services'    => array(ESET_OFFICIAL_MOBILE_SERVICE),
        'ajax'          => true,
        'loginrequired' => false,
    ),
);
