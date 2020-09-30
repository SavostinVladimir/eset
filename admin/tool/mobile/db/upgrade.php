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
 * Mobile app support.
 *
 * @package    tool_mobile
 * @copyright  2019 The Open University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

require_once($CFG->dirroot . '/lib/upgradelib.php');

/**
 * Upgrade the plugin.
 *
 * @param int $oldversion
 * @return bool always true
 */
function xmldb_tool_mobile_upgrade($oldversion) {
    global $CFG;

    if ($oldversion < 2019021100) {
        $disabledfeatures = get_config('tool_mobile', 'disabledfeatures');
        $disabledfeatures = str_replace('remoteAddOn_', 'sitePlugin_', $disabledfeatures);
        set_config('disabledfeatures', $disabledfeatures, 'tool_mobile');
        upgrade_plugin_savepoint(true, 2019021100, 'tool', 'mobile');
    }

    // Automatically generated Eset v3.7.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Eset v3.8.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Eset v3.9.0 release upgrade line.
    // Put any upgrade step following this.

    return true;
}
