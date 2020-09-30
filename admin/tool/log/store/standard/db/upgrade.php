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
 * Standard log store upgrade.
 *
 * @package    logstore_standard
 * @copyright  2014 Petr Skoda
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

function xmldb_logstore_standard_upgrade($oldversion) {
    global $CFG;

    // Automatically generated Eset v3.5.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Eset v3.6.0 release upgrade line.
    // Put any upgrade step following this.

    if ($oldversion < 2019032800) {
        // For existing installations, set the new jsonformat option to off (no behaviour change).
        // New installations default to on.
        set_config('jsonformat', 0, 'logstore_standard');
        upgrade_plugin_savepoint(true, 2019032800, 'logstore', 'standard');
    }

    // Automatically generated Eset v3.7.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Eset v3.8.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Eset v3.9.0 release upgrade line.
    // Put any upgrade step following this.

    return true;
}
