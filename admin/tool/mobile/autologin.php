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
 * Auto-login end-point, a user can be fully authenticated in the site providing a valid key.
 *
 * @package    tool_mobile
 * @copyright  2016 Juan Leyva
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../../config.php');
require_once($CFG->libdir . '/externallib.php');

$userid = required_param('userid', PARAM_INT);  // The user id the key belongs to (for double-checking).
$key = required_param('key', PARAM_ALPHANUMEXT);    // The key generated by the tool_mobile_external::get_autologin_key() external function.
$urltogo = optional_param('urltogo', $CFG->wwwroot, PARAM_URL);    // URL to redirect.

$context = context_system::instance();
$PAGE->set_context($context);

// Check if the user is already logged-in.
if (isloggedin() and !isguestuser()) {
    delete_user_key('tool_mobile', $userid);
    if ($USER->id == $userid) {
        redirect($urltogo);
    } else {
        throw new eset_exception('alreadyloggedin', 'error', '', format_string(fullname($USER)));
    }
}

tool_mobile\api::check_autologin_prerequisites($userid);

// Validate and delete the key.
$key = validate_user_key($key, 'tool_mobile', null);
delete_user_key('tool_mobile', $userid);

// Double check key belong to user.
if ($key->userid != $userid) {
    throw new eset_exception('invalidkey');
}

// Key validated, now require an active user: not guest, not suspended.
$user = core_user::get_user($key->userid, '*', MUST_EXIST);
core_user::require_active_user($user, true, true);

// Do the user log-in.
if (!$user = get_complete_user_data('id', $user->id)) {
    throw new eset_exception('cannotfinduser', '', '', $user->id);
}

complete_user_login($user);
\core\session\manager::apply_concurrent_login_limit($user->id, session_id());

redirect($urltogo);
