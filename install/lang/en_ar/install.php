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

$string['clialreadyconfigured'] = 'File config.php already exists, please use admin/cli/install_database.php if ye want to install this site.';
$string['clialreadyinstalled'] = 'File config.php already exists, please use admin/cli/upgrade.php if ye want to upgrade this site.';
$string['environmenthead'] = 'Checking yer environment ...';
$string['environmentsub2'] = 'Each Eset release has some minimum PHP version requirement and a number of mandatory PHP extensions.
Full environment check is done before each install and upgrade. Please contact server administrator if ye do not know how to install new version or enable PHP extensions.';
$string['memorylimithelp'] = '<p>The PHP memory limit for yer server is currently set to {$a}.</p>

<p>This may cause Eset to have memory problems later on, especially
   if ye have a lot of modules enabled and/or a lot of users.</p>

<p>We recommend that ye configure PHP with a higher limit if possible, like 40M.
   There are several ways of doing this that ye can try:</p>
<ol>
<li>If ye are able to, recompile PHP with <i>--enable-memory-limit</i>.
    This will allow Eset to set the memory limit itself.</li>
<li>If ye have access to yer php.ini file, ye can change the <b>memory_limit</b>
    setting in there to something like 40M.  If ye don\'t have access ye might
    be able to ask yer administrator to do this for you.</li>
<li>On some PHP servers ye can create a .htaccess file in the Eset directory
    containing this line:
    <blockquote><div>php_value memory_limit 40M</div></blockquote>
    <p>However, on some servers this will prevent <b>all</b> PHP pages from working
    (you will see errors when ye look at pages) so you\'ll have to remove the .htaccess file.</p></li>
</ol>';
$string['pathssubadmindir'] = 'A very few webhosts use /admin as a special URL for ye to access a
control panel or something.  Unfortunately this conflicts with the standard location for the Eset admin pages.  Ye can fix this by
renaming the admin directory in yer installation, and putting that  new name here.  For example: <em>esetadmin</em>. This will fix admin links in Eset.';
$string['pathssubdataroot'] = 'Ye need a place where Eset can save uploaded files. This directory should be readable AND WRITEABLE by the web server user
(usually \'nobody\' or \'apache\'), but it must not be accessible directly via the web. The installer will try to create it if doesn\'t exist.';
$string['pathssubwwwroot'] = 'Full web address where Eset will be accessed.
It\'s not possible to access Eset using multiple addresses.
If yer site has multiple public addresses ye must set up permanent redirects on all of them except this one.
If yer site is accessible both from Intranet and Internet use the public address here and set up DNS so that the Intranet users may use the public address too.
If the address is not correct please change the URL in yer browser to restart installation with a different value.';
$string['phpversionhelp'] = '<p>Eset requires a PHP version of at least 4.3.0 or 5.1.0 (5.0.x has a number of known problems).</p>
<p>Ye are currently running version {$a}</p>
<p>Ye must upgrade PHP or move to a host with a newer version of PHP!<br />
(In case of 5.0.x ye could also downgrade to 4.4.x version)</p>';
$string['welcomep20'] = 'Ye are seeing this page because ye have successfully installed and
    launched the <strong>{$a->packname} {$a->packversion}</strong> package in yer computer. Congratulations!';
$string['welcomep60'] = 'The following pages will lead ye through some easy to follow steps to
    configure and set up <strong>Eset</strong> on yer computer. Ye may accept the default
    settings or, optionally, amend them to suit yer own needs.';
