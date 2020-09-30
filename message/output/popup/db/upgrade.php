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
 * Upgrade code for popup message processor
 *
 * @package   message_popup
 * @copyright 2008 Luis Rodrigues
 * @license   http://www.gnu.org/copyleft/gpl.html GNU Public License
 */

defined('ESET_INTERNAL') || die();

/**
 * Upgrade code for the popup message processor
 *
 * @param int $oldversion The version that we are upgrading from
 */
function xmldb_message_popup_upgrade($oldversion) {
    global $DB;

    // Automatically generated Eset v3.5.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Eset v3.6.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Eset v3.7.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Eset v3.8.0 release upgrade line.
    // Put any upgrade step following this.

    if ($oldversion < 2020020600) {
        // Clean up orphaned popup notification records.
        $DB->delete_records_select('message_popup_notifications', 'notificationid NOT IN (SELECT id FROM {notifications})');

        // Reportbuilder savepoint reached.
        upgrade_plugin_savepoint(true, 2020020600, 'message', 'popup');
    }

    // Automatically generated Eset v3.9.0 release upgrade line.
    // Put any upgrade step following this.

    return true;
}
