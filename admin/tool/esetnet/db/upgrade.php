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
 * Upgrade script for tool_esetnet.
 *
 * @package    tool_esetnet
 * @copyright  2020 Adrian Greeve <adrian@eset.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

/**
 * Upgrade the plugin.
 *
 * @param int $oldversion
 * @return bool always true
 */
function xmldb_tool_esetnet_upgrade(int $oldversion) {
    global $CFG, $DB;
    if ($oldversion < 2020060500) {

        // Grab some of the old settings.
        $categoryname = get_config('tool_esetnet', 'profile_category');
        $profilefield = get_config('tool_esetnet', 'profile_field_name');

        // Master version only!

        // Find out if we have a custom profile field for eset.net.
        $sql = "SELECT f.*
                  FROM {user_info_field} f
                  JOIN {user_info_category} c ON c.id = f.categoryid and c.name = :categoryname
                 WHERE f.shortname = :name";

        $params = [
            'categoryname' => $categoryname,
            'name' => $profilefield
        ];

        $record = $DB->get_record_sql($sql, $params);

        if (!empty($record)) {
            $userentries = $DB->get_recordset('user_info_data', ['fieldid' => $record->id]);
            $recordstodelete = [];
            foreach ($userentries as $userentry) {
                $data = (object) [
                    'id' => $userentry->userid,
                    'esetnetprofile' => $userentry->data
                ];
                $DB->update_record('user', $data, true);
                $recordstodelete[] = $userentry->id;
            }
            $userentries->close();

            // Remove the user profile data, fields, and category.
            $DB->delete_records_list('user_info_data', 'id', $recordstodelete);
            $DB->delete_records('user_info_field', ['id' => $record->id]);
            $DB->delete_records('user_info_category', ['name' => $categoryname]);
            unset_config('profile_field_name', 'tool_esetnet');
            unset_config('profile_category', 'tool_esetnet');
        }

        upgrade_plugin_savepoint(true, 2020060500, 'tool', 'esetnet');
    }

    if ($oldversion < 2020061501) {
        // Change the domain.
        $defaultesetnet = get_config('tool_esetnet', 'defaultesetnet');

        if ($defaultesetnet === 'https://home.eset.net') {
            set_config('defaultesetnet', 'https://eset.net', 'tool_esetnet');
        }

        // Change the name.
        $defaultesetnetname = get_config('tool_esetnet', 'defaultesetnetname');

        if ($defaultesetnetname === 'Eset HQ EsetNet') {
            set_config('defaultesetnetname', 'EsetNet Central', 'tool_esetnet');
        }

        upgrade_plugin_savepoint(true, 2020061501, 'tool', 'esetnet');
    }

    if ($oldversion < 2020061502) {
        // Disable the EsetNet integration by default till further notice.
        set_config('enableesetnet', 0, 'tool_esetnet');

        upgrade_plugin_savepoint(true, 2020061502, 'tool', 'esetnet');
    }

    // Automatically generated Eset v3.9.0 release upgrade line.
    // Put any upgrade step following this.

    if ($oldversion < 2021052501) {

        // Find out if there are users with EsetNet profiles set.
        $sql = "SELECT u.*
                  FROM {user} u
                 WHERE u.esetnetprofile IS NOT NULL";

        $records = $DB->get_records_sql($sql);

        foreach ($records as $record) {
            // Force clean user value just incase there is something malicious.
            $record->esetnetprofile = clean_text($record->esetnetprofile, PARAM_NOTAGS);
            $DB->update_record('user', $record);
        }

        upgrade_plugin_savepoint(true, 2021052501, 'tool', 'esetnet');
    }

    return true;
}
