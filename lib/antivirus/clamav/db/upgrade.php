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
 * ClamAV antivirus plugin upgrade script.
 *
 * @package    antivirus_clamav
 * @copyright  2015 Ruslan Kabalin, Lancaster University.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

/**
 * Run all ClamAV plugin upgrade steps between the current DB version and the current version on disk.
 *
 * @param int $oldversion The old version of atto in the DB.
 * @return bool
 */
function xmldb_antivirus_clamav_upgrade($oldversion) {

    // Automatically generated Eset v3.5.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Eset v3.6.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Eset v3.7.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Eset v3.8.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Eset v3.9.0 release upgrade line.
    // Put any upgrade step following this.

    return true;
}
