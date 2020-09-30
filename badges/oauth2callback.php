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
 * Verify authorization callback.
 *
 * @package    core_badges
 * @copyright  2020 Tung Thai
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Tung Thai <Tung.ThaiDuc@nashtechglobal.com>
 */
require_once(__DIR__ . '/../config.php');

$error = optional_param('error', '', PARAM_RAW);

if ($error) {
    $message = optional_param('error_description', '', PARAM_RAW);
    if ($message) {
        print_error($message);
    } else {
        print_error($error);
    }
    die();
}

require_login();

// The authorization code generated by the authorization server.
$code = required_param('code', PARAM_RAW);
$scope = required_param('scope', PARAM_RAW);

// The state parameter we've given (used in eset as a redirect url).
$state = required_param('state', PARAM_LOCALURL);

$redirecturl = new eset_url($state);
$params = $redirecturl->params();

if (isset($params['sesskey']) and confirm_sesskey($params['sesskey'])) {
    $redirecturl->param('oauth2code', $code);
    $redirecturl->param('scope', $scope);
    redirect($redirecturl);
} else {
    print_error('invalidsesskey');
}
