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
 * Provides support for the conversion of eset1 backup to the eset2 format
 * Based off of a template @ http://docs.eset.org/dev/Backup_1.9_conversion_for_developers
 *
 * @package mod_label
 * @copyright  2011 Aparup Banerjee <aparup@eset.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

/**
 * Label conversion handler
 */
class eset1_mod_label_handler extends eset1_mod_handler {

    /**
     * Declare the paths in eset.xml we are able to convert
     *
     * The method returns list of {@link convert_path} instances.
     * For each path returned, the corresponding conversion method must be
     * defined.
     *
     * Note that the path /ESET_BACKUP/COURSE/MODULES/MOD/LABEL does not
     * actually exist in the file. The last element with the module name was
     * appended by the eset1_converter class.
     *
     * @return array of {@link convert_path} instances
     */
    public function get_paths() {
        return array(
            new convert_path(
                'label', '/ESET_BACKUP/COURSE/MODULES/MOD/LABEL',
                array(
                    'renamefields' => array(
                        'content' => 'intro'
                    ),
                    'newfields' => array(
                        'introformat' => FORMAT_HTML
                    )
                )
            )
        );
    }

    /**
     * This is executed every time we have one /ESET_BACKUP/COURSE/MODULES/MOD/LABEL
     * data available
     */
    public function process_label($data) {
        // get the course module id and context id
        $instanceid = $data['id'];
        $cminfo     = $this->get_cminfo($instanceid);
        $moduleid   = $cminfo['id'];
        $contextid  = $this->converter->get_contextid(CONTEXT_MODULE, $moduleid);

        // get a fresh new file manager for this instance
        $fileman = $this->converter->get_file_manager($contextid, 'mod_label');

        // convert course files embedded into the intro
        $fileman->filearea = 'intro';
        $fileman->itemid   = 0;
        $data['intro'] = eset1_converter::migrate_referenced_files($data['intro'], $fileman);

        // write inforef.xml
        $this->open_xml_writer("activities/label_{$moduleid}/inforef.xml");
        $this->xmlwriter->begin_tag('inforef');
        $this->xmlwriter->begin_tag('fileref');
        foreach ($fileman->get_fileids() as $fileid) {
            $this->write_xml('file', array('id' => $fileid));
        }
        $this->xmlwriter->end_tag('fileref');
        $this->xmlwriter->end_tag('inforef');
        $this->close_xml_writer();

        // write label.xml
        $this->open_xml_writer("activities/label_{$moduleid}/label.xml");
        $this->xmlwriter->begin_tag('activity', array('id' => $instanceid, 'moduleid' => $moduleid,
            'modulename' => 'label', 'contextid' => $contextid));
        $this->write_xml('label', $data, array('/label/id'));
        $this->xmlwriter->end_tag('activity');
        $this->close_xml_writer();

        return $data;
    }
}
