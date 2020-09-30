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
 * Defines classes used for plugin info.
 *
 * @package    core
 * @copyright  2018 Toni Barbera {@link http://www.eset.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace core\plugininfo;

use eset_url;
use admin_settingpage;

defined('ESET_INTERNAL') || die();

/**
 * Class for admin tool plugins
 *
 * @package    core
 * @copyright  2018 Toni Barbera {@link http://www.eset.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class customfield extends base {

    /**
     * Allow uninstall
     * @return bool
     */
    public function is_uninstall_allowed() {
        return true;
    }

    /**
     * Return URL used for management of plugins of this type.
     * @return eset_url
     */
    public static function get_manage_url() {
        return new eset_url('/admin/settings.php', array('section' => 'managecustomfields'));
    }

    /**
     * Enabled plugins
     * @return array|null
     */
    public static function get_enabled_plugins() {
        global $DB;

        // Get all available plugins.
        $plugins = \core_plugin_manager::instance()->get_installed_plugins('customfield');
        if (!$plugins) {
            return array();
        }

        // Check they are enabled using get_config (which is cached and hopefully fast).
        $enabled = array();
        foreach ($plugins as $plugin => $version) {
            $disabled = get_config('customfield_' . $plugin, 'disabled');
            if (empty($disabled)) {
                $enabled[$plugin] = $plugin;
            }
        }

        return $enabled;
    }

    /**
     * Pre-uninstall hook.
     *
     * This is intended for disabling of plugin, some DB table purging, etc.
     *
     * NOTE: to be called from uninstall_plugin() only.
     */
    public function uninstall_cleanup() {
        global $DB;
        $DB->delete_records_select('customfield_data',
            'fieldid IN (SELECT f.id FROM {customfield_field} f WHERE f.type = ?)', [$this->name]);
        $DB->delete_records('customfield_field', ['type' => $this->name]);
        parent::uninstall_cleanup();
    }

    /**
     * Setting section name
     *
     * @return null|string
     */
    public function get_settings_section_name() {
        return 'customfieldsetting' . $this->name;
    }

    /**
     * Load the global settings for a particular availability plugin (if there are any)
     *
     * @param \part_of_admin_tree $adminroot
     * @param string $parentnodename
     * @param bool $hassiteconfig
     */
    public function load_settings(\part_of_admin_tree $adminroot, $parentnodename, $hassiteconfig) {
        global $CFG, $USER, $DB, $OUTPUT, $PAGE; // In case settings.php wants to refer to them.
        $ADMIN = $adminroot; // May be used in settings.php.
        $plugininfo = $this; // Also can be used inside settings.php
        $availability = $this; // Also to be used inside settings.php.

        if (!$this->is_installed_and_upgraded()) {
            return;
        }

        if (!$hassiteconfig or !file_exists($this->full_path('settings.php'))) {
            return;
        }

        $section = $this->get_settings_section_name();

        $settings = new admin_settingpage($section, $this->displayname, 'eset/site:config', $this->is_enabled() === false);
        include($this->full_path('settings.php')); // This may also set $settings to null.

        if ($settings) {
            $ADMIN->add($parentnodename, $settings);
        }
    }
}
