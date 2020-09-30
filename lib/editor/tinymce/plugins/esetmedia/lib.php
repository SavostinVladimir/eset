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

defined('ESET_INTERNAL') || die();

/**
 * Plugin for Eset media (audio/video) insertion dialog.
 *
 * @package   tinymce_esetmedia
 * @copyright 2012 The Open University
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class tinymce_esetmedia extends editor_tinymce_plugin {
    /** @var array list of buttons defined by this plugin */
    protected $buttons = array('esetmedia');

    protected function update_init_params(array &$params, context $context,
            array $options = null) {

        // Add file picker callback.
        if (empty($options['legacy'])) {
            if (isset($options['maxfiles']) and $options['maxfiles'] != 0) {
                $params['file_browser_callback'] = "M.editor_tinymce.filepicker";
            }
        }

        if ($row = $this->find_button($params, 'esetemoticon')) {
            // Add button after 'esetemoticon' icon.
            $this->add_button_after($params, $row, 'esetmedia', 'esetemoticon');
        } else if ($row = $this->find_button($params, 'image')) {
            // Note: We know that the plugin emoticon button has already been added
            // if it is enabled because this plugin has higher sortorder.
            // Otherwise add after 'image'.
            $this->add_button_after($params, $row, 'esetmedia', 'image');
        } else {
            // Add this button in the end of the first row (by default 'image' button should be in the first row).
            $this->add_button_after($params, 1, 'esetmedia');
        }

        // Add JS file, which uses default name.
        $this->add_js_plugin($params);
    }

    protected function get_sort_order() {
        return 110;
    }
}
