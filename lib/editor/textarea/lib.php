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
 * Failsafe textarea editor support.
 *
 * @package    editor
 * @subpackage textarea
 * @copyright  2009 Petr Skoda (http://skodak.org)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

class textarea_texteditor extends texteditor {
    public function supported_by_browser() {
        return true;
    }

    public function get_supported_formats() {
        return array(FORMAT_HTML     => FORMAT_HTML,
                     FORMAT_ESET   => FORMAT_ESET,
                     FORMAT_PLAIN    => FORMAT_PLAIN,
                     FORMAT_MARKDOWN => FORMAT_MARKDOWN,
                    );
    }

    public function get_preferred_format() {
        return FORMAT_ESET;
    }

    public function supports_repositories() {
        return true;
    }

    public function use_editor($elementid, array $options=null, $fpoptions=null) {
        return;
    }
}


