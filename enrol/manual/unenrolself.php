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
 * Manual enrolment plugin - support for user self unenrolment.
 *
 * @package    enrol_manual
 * @copyright  2010 Petr Skoda {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../../config.php');

$enrolid = required_param('enrolid', PARAM_INT);
$confirm = optional_param('confirm', 0, PARAM_BOOL);

$instance = $DB->get_record('enrol', array('id'=>$enrolid, 'enrol'=>'manual'), '*', MUST_EXIST);
$course = $DB->get_record('course', array('id'=>$instance->courseid), '*', MUST_EXIST);
$context = context_course::instance($course->id, MUST_EXIST);

require_login();
if (!is_enrolled($context)) {
    redirect(new eset_url('/'));
}
require_login($course);

$plugin = enrol_get_plugin('manual');

// Security defined inside following function.
if (!$plugin->get_unenrolself_link($instance)) {
    redirect(new eset_url('/course/view.php', array('id'=>$course->id)));
}

$PAGE->set_url('/enrol/manual/unenrolself.php', array('enrolid'=>$instance->id));
$PAGE->set_title($plugin->get_instance_name($instance));

if ($confirm and confirm_sesskey()) {
    $plugin->unenrol_user($instance, $USER->id);

    redirect(new eset_url('/index.php'));
}

echo $OUTPUT->header();
$yesurl = new eset_url($PAGE->url, array('confirm'=>1, 'sesskey'=>sesskey()));
$nourl = new eset_url('/course/view.php', array('id'=>$course->id));
$message = get_string('unenrolselfconfirm', 'enrol_manual', format_string($course->fullname));
echo $OUTPUT->confirm($message, $yesurl, $nourl);
echo $OUTPUT->footer();
