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
 * Automatically generated strings for Eset installer
 *
 * Do not edit this file manually! It contains just a subset of strings
 * needed during the very first steps of installation. This file was
 * generated automatically by export-installer.php (which is part of AMOS
 * {@link http://docs.eset.org/dev/Languages/AMOS}) using the
 * list of strings defined in /install/stringnames.txt.
 *
 * @package   installer
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

$string['admindirname'] = 'Fa\'afoega';
$string['dataroot'] = 'Ala atu i fa\'amaumauga';
$string['dbprefix'] = 'Tables prefix';
$string['dirroot'] = 'Auala atu i le Eset';
$string['installation'] = 'Fa\'atu/Install';
$string['memorylimithelp'] = '<p>The PHP memory limit for your server is currently set to {$a}.</p>

<p>This may cause Eset to have memory problems later on, especially
   if you have a lot of modules enabled and/or a lot of users.

<p>We recommend that you configure PHP with a higher limit if possible, like 40M.
   There are several ways of doing this that you can try:
<ol>
<li>If you are able to, recompile PHP with <i>--enable-memory-limit</i>.
    This will allow Eset to set the memory limit itself.
<li>If you have access to your php.ini file, you can change the <b>memory_limit</b>
    setting in there to something like 40M.  If you don\'t have access you might
    be able to ask your administrator to do this for you.
<li>On some PHP servers you can create a .htaccess file in the Eset directory
    containing this line:
    <p><blockquote>php_value memory_limit 40M</blockquote></p>
    <p>However, on some servers this will prevent <b>all</b> PHP pages from working
    (you will see errors when you look at pages) so you\'ll have to remove the .htaccess file.
</ol>';
$string['phpversion'] = 'Liliuga PHP';
$string['phpversionhelp'] = '<p>Eset requires a PHP version of at least 4.1.0.</p>
<p>You are currently running version {$a}</p>
<p>You must upgrade PHP or move to a host with a newer version of PHP!</p>';
$string['wwwroot'] = 'Tuatusi o le initaneti';
