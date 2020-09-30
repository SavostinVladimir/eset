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
 * Strings for component 'feedback_offline', language 'en'
 *
 * @package   assignfeedback_offline
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['confirmimport'] = 'Confirm grades import';
$string['default'] = 'Enabled by default';
$string['default_help'] = 'If set, offline grading with worksheets will be enabled by default for all new assignments.';
$string['downloadgrades'] = 'Download grading worksheet';
$string['enabled'] = 'Offline grading worksheet';
$string['enabled_help'] = 'If enabled, the teacher will be able to download and upload a worksheet with student grades when marking the assignments.';
$string['feedbackupdate'] = 'Set field "{$a->field}" for "{$a->student}" to "{$a->text}"';
$string['graderecentlymodified'] = 'The grade has been modified in Eset more recently than in the grading worksheet for {$a}';
$string['gradelockedingradebook'] = 'The grade has been locked in the gradebook for {$a}';
$string['gradeupdate'] = 'Set grade for {$a->student} to {$a->grade}';
$string['ignoremodified'] = 'Allow updating records that have been modified more recently in Eset than in the spreadsheet.';
$string['ignoremodified_help'] = 'When the grading worksheet is downloaded from Eset it contains the last modified date for each of the grades. If any of the grades are updated in Eset after this worksheet is downloaded, by default Eset will refuse to overwrite this updated information when importing the grades. By selecting this option Eset will disable this safety check and it may be possible for multiple markers to overwrite each others grades.';
$string['importgrades'] = 'Confirm changes in grading worksheet';
$string['invalidgradeimport'] = 'Eset could not read the uploaded worksheet. Make sure it is saved in comma separated value format (.csv) and try again.';
$string['gradesfile'] = 'Grading worksheet (csv format)';
$string['gradesfile_help'] = 'Grading worksheet with modified grades. This file must be a CSV file with UTF-8 encoding that has been downloaded from the assignment, with columns for student grade and identifier.';
$string['privacy:nullproviderreason'] = 'This plugin has no database to store user information. It only uses APIs in mod_assign to help with displaying the grading interface.';
$string['nochanges'] = 'No modified grades found in uploaded worksheet';
$string['offlinegradingworksheet'] = 'Grades';
$string['pluginname'] = 'Offline grading worksheet';
$string['processgrades'] = 'Import grades';
$string['skiprecord'] = 'Skip record';
$string['updaterecord'] = 'Update record';
$string['uploadgrades'] = 'Upload grading worksheet';
$string['updatedgrades'] = 'Updated {$a} grades and feedback';
