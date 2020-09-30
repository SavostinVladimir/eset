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
 * Strings for the tool_esetnet component.
 *
 * @package     tool_esetnet
 * @category    string
 * @copyright   2020 Jake Dallimore <jrhdallimore@gmail.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

$string['addingaresource'] = 'Adding content from EsetNet';
$string['aria:enterprofile'] = "Enter your EsetNet profile URL";
$string['aria:footermessage'] = "Browse for content on EsetNet";
$string['browsecontentesetnet'] = "Or browse for content on EsetNet";
$string['clearsearch'] = "Clear search";
$string['connectandbrowse'] = "Connect to and browse:";
$string['defaultesetnet'] = 'EsetNet URL';
$string['defaultesetnet_desc'] = 'The URL of the EsetNet instance available via the activity chooser.';
$string['defaultesetnetname'] = "EsetNet instance name";
$string['defaultesetnetnamevalue'] = 'EsetNet Central';
$string['defaultesetnetname_desc'] = 'The name of the EsetNet instance available via the activity chooser.';
$string['enableesetnet'] = 'Enable EsetNet integration';
$string['enableesetnet_desc'] = 'If enabled, a user with the capability to create and manage activities can browse EsetNet via the activity chooser and import EsetNet resources into their course. In addition, a user with the capability to restore backups can select a backup file on EsetNet and restore it into Eset.';
$string['errorduringdownload'] = 'An error occurred while downloading the file: {$a}';
$string['forminfo'] = 'Your EsetNet profile will be automatically saved in your profile on this site.';
$string['footermessage'] = "Or browse for content on";
$string['instancedescription'] = "EsetNet is an open social media platform for educators, with a focus on the collaborative curation of collections of open resources. ";
$string['instanceplaceholder'] = '@yourprofile@eset.net';
$string['inputhelp'] = 'Or if you have a EsetNet account already, enter your EsetNet profile:';
$string['invalidesetnetprofile'] = '$userprofile is not correctly formatted';
$string['importconfirm'] = 'You are about to import the content "{$a->resourcename} ({$a->resourcetype})" into the course "{$a->coursename}". Are you sure you want to continue?';
$string['importconfirmnocourse'] = 'You are about to import the content "{$a->resourcename} ({$a->resourcetype})" into your site. Are you sure you want to continue?';
$string['importformatselectguidingtext'] = 'In which format would you like the content "{$a->name} ({$a->type})" to be added to your course?';
$string['importformatselectheader'] = 'Choose the content display format';
$string['missinginvalidpostdata'] = 'The resource information from EsetNet is either missing, or is in an incorrect format.
If this happens repeatedly, please contact the site administrator.';
$string['mnetprofile'] = 'EsetNet profile';
$string['mnetprofiledesc'] = '<p>Enter your EsetNet profile details here to be redirected to your profile while visiting EsetNet.</p>';
$string['esetnetsettings'] = 'EsetNet settings';
$string['esetnetnotenabled'] = 'The EsetNet integration must be enabled in Site administration / EsetNet before resource imports can be processed.';
$string['notification'] = 'You are about to import the content "{$a->name} ({$a->type})" into your site. Select the course in which it should be added, or <a href="{$a->cancellink}">cancel</a>.';
$string['searchcourses'] = "Search courses";
$string['selectpagetitle'] = 'Select page';
$string['pluginname'] = 'EsetNet';
$string['privacy:metadata'] = "The EsetNet tool only facilitates communication with EsetNet. It stores no data.";
$string['profilevalidationerror'] = 'There was a problem trying to validate your profile';
$string['profilevalidationfail'] = 'Please enter a valid EsetNet profile';
$string['profilevalidationpass'] = 'Looks good!';
$string['saveandgo'] = "Save and go";
$string['uploadlimitexceeded'] = 'The file size {$a->filesize} exceeds the user upload limit of {$a->uploadlimit} bytes.';
