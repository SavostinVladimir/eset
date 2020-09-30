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
 * Mediaplugin filter settings
 *
 * @package    filter_mediaplugin
 * @copyright  2016 Marina Glancy
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $url = new eset_url('/admin/settings.php', ['section' => 'managemediaplayers']);
    $item = new admin_setting_heading('filter_mediaplugin/about',
        '',
        new lang_string('linktomedia', 'filter_mediaplugin', $url->out()));
    $settings->add($item);

}
