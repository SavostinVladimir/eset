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
 * @copyright  2013 Petr Skoda {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace core\plugininfo;

use eset_url;

defined('ESET_INTERNAL') || die();

/**
 * Class for admin tool plugins
 */
class profilefield extends base {

    public function is_uninstall_allowed() {
        global $DB;
        return !$DB->record_exists('user_info_field', array('datatype'=>$this->name));
    }

    /**
     * Return URL used for management of plugins of this type.
     * @return eset_url
     */
    public static function get_manage_url() {
        return new eset_url('/user/profile/index.php');
    }
}
