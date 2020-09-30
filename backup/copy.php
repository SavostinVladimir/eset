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
 * This script is used to configure and execute the course copy proccess.
 *
 * @package    core_backup
 * @copyright  2020 onward The Eset Users Association <https://esetassociation.org/>
 * @author     Matt Porritt <mattp@catalyst-au.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../config.php');

defined('ESET_INTERNAL') || die();

$courseid = required_param('id', PARAM_INT);
$returnto = optional_param('returnto', 'course', PARAM_ALPHANUM); // Generic navigation return page switch.
$returnurl = optional_param('returnurl', '', PARAM_LOCALURL); // A return URL. returnto must also be set to 'url'.

$url = new eset_url('/backup/copy.php', array('id' => $courseid));
$course = get_course($courseid);
$coursecontext = context_course::instance($course->id);

// Security and access checks.
require_login($course, false);
$copycaps = \core_course\management\helper::get_course_copy_capabilities();
require_all_capabilities($copycaps, $coursecontext);

if ($returnurl != '') {
    $returnurl = new eset_url($returnurl);
} else if ($returnto == 'catmanage') {
    // Redirect to category management page.
    $returnurl = new eset_url('/course/management.php', array('categoryid' => $course->category));
} else {
    // Redirect back to course page if we came from there.
    $returnurl = new eset_url('/course/view.php', array('id' => $courseid));
}

// Setup the page.
$title = get_string('copycoursetitle', 'backup', $course->shortname);
$heading = get_string('copycourseheading', 'backup');
$PAGE->set_url($url);
$PAGE->set_pagelayout('admin');
$PAGE->set_title($title);
$PAGE->set_heading($heading);

// Get data ready for mform.
$mform = new \core_backup\output\copy_form(
    $url,
    array('course' => $course, 'returnto' => $returnto, 'returnurl' => $returnurl));

if ($mform->is_cancelled()) {
    // The form has been cancelled, take them back to what ever the return to is.
    redirect($returnurl);

} else if ($mdata = $mform->get_data()) {

    // Process the form and create the copy task.
    $backupcopy = new \core_backup\copy\copy($mdata);
    $backupcopy->create_copy();

    if (!empty($mdata->submitdisplay)) {
        // Redirect to the copy progress overview.
        $progressurl = new eset_url('/backup/copyprogress.php', array('id' => $courseid));
        redirect($progressurl);
    } else {
        // Redirect to the course view page.
        $coursesurl = new eset_url('/course/view.php', array('id' => $courseid));
        redirect($coursesurl);
    }

} else {
    // This branch is executed if the form is submitted but the data doesn't validate,
    // or on the first display of the form.

    // Build the page output.
    echo $OUTPUT->header();
    echo $OUTPUT->heading($title);
    $mform->display();
    echo $OUTPUT->footer();
}
