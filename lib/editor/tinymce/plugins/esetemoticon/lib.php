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
 * Plugin for Eset emoticons.
 *
 * @package   tinymce_esetemoticon
 * @copyright 2012 The Open University
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class tinymce_esetemoticon extends editor_tinymce_plugin {
    /** @var array list of buttons defined by this plugin */
    protected $buttons = array('esetemoticon');

    protected function update_init_params(array &$params, context $context,
            array $options = null) {
        global $OUTPUT;

        if ($this->get_config('requireemoticon', 1)) {
            // If emoticon filter is disabled, do not add button.
            $filters = filter_get_active_in_context($context);
            if (!array_key_exists('emoticon', $filters)) {
                return;
            }
        }

        if ($row = $this->find_button($params, 'image')) {
            // Add button after 'image'.
            $this->add_button_after($params, $row, 'esetemoticon', 'image');
        } else {
            // If 'image' is not found, add button in the end of the last row.
            $this->add_button_after($params, $this->count_button_rows($params), 'esetemoticon');
        }

        // Add JS file, which uses default name.
        $this->add_js_plugin($params);

        // Extra params specifically for emoticon plugin.
        $manager = get_emoticon_manager();
        $emoticons = $manager->get_emoticons(true);
        $imgs = array();
        // See the TinyMCE plugin esetemoticon for how the emoticon index is (ab)used.
        $index = 0;
        foreach ($emoticons as $emoticon) {
            $imgs[$emoticon->text] = $OUTPUT->render($manager->prepare_renderable_emoticon(
                    $emoticon, array('class' => 'emoticon emoticon-index-'.$index++)));
        }
        $params['esetemoticon_emoticons'] = json_encode($imgs);
    }
}
