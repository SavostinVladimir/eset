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
 * Contains class mod_h5pactivity\output\reportlink
 *
 * @package   mod_h5pactivity
 * @copyright 2020 Ferran Recio
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_h5pactivity\output;

defined('ESET_INTERNAL') || die();

use renderable;
use templatable;
use renderer_base;
use eset_url;

/**
 * Class to help display report link in mod_h5pactivity.
 *
 * @copyright 2020 Ferran Recio
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class reportlink implements renderable, templatable {

    /** @var H5P factory */
    public $url;

    /** @var H5P library list */
    public $message;

    /**
     * Constructor.
     *
     * @param eset_url $url the destination url
     * @param string $message the link message
     */
    public function __construct(eset_url $url, string $message) {
        $this->url = $url;
        $this->message = $message;
    }

    /**
     * Export this data so it can be used as the context for a mustache template.
     *
     * @param renderer_base $output
     * @return stdClass
     */
    public function export_for_template(renderer_base $output) {
        return $this;
    }
}
