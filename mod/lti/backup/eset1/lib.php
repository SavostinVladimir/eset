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
 * 1.9 to 2.0 backup format converter. (Also currently used in common cartridge import process)
 *
 * @package mod_lti
 * @copyright  Copyright (c) 2011 Esetrooms Inc. (http://www.esetrooms.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Darko Miletic
 */

defined('ESET_INTERNAL') || die();

class eset1_mod_lti_handler extends eset1_mod_handler {

    /** @var eset1_file_manager */
    protected $fileman = null;

    /** @var int cmid */
    protected $moduleid = null;

    /**
     * Declare the paths in eset.xml we are able to convert
     *
     * The method returns list of {@link convert_path} instances.
     * For each path returned, the corresponding conversion method must be
     * defined.
     *
     * Note that the path /ESET_BACKUP/COURSE/MODULES/MOD/LTI does not
     * actually exist in the file. The last element with the module name was
     * appended by the eset1_converter class.
     *
     * @return array of {@link convert_path} instances
     */
    public function get_paths() {

        return array(
            new convert_path(
                'basiclti', '/ESET_BACKUP/COURSE/MODULES/MOD/LTI'
            )
        );

    }

    /**
     * This is executed every time we have one /ESET_BACKUP/COURSE/MODULES/MOD/LTI
     * data available
     */
    public function process_basiclti($data) {
        global $DB;

        // Get the course module id and context id.
        $instanceid     = $data['id'];
        $cminfo         = $this->get_cminfo($instanceid);
        $this->moduleid = $cminfo['id'];
        $contextid      = $this->converter->get_contextid(CONTEXT_MODULE, $this->moduleid);

        // Get a fresh new file manager for this instance.
        $this->fileman = $this->converter->get_file_manager($contextid, 'mod_lti');

        // Convert course files embedded into the intro.
        $this->fileman->filearea = 'intro';
        $this->fileman->itemid   = 0;
        $data['intro'] = eset1_converter::migrate_referenced_files($data['intro'], $this->fileman);

        // Start writing assignment.xml.
        $this->open_xml_writer("activities/lti_{$this->moduleid}/lti.xml");
        $this->xmlwriter->begin_tag('activity', array('id' => $instanceid, 'moduleid' => $this->moduleid,
                'modulename' => 'lti', 'contextid' => $contextid));
        $this->xmlwriter->begin_tag('lti', array('id' => $instanceid));

        $ignorefields = array('id', 'modtype');
        if (!$DB->record_exists('lti_types', array('id' => $data['typeid']))) {
            $ntypeid = false;
            $toolurls = $DB->get_records_select(
                    'lti_types_config',
                    "name = 'toolurl' AND " . $DB->sql_compare_text('value', 256) . ' = ' .  $DB->sql_compare_text('?', 256),
                    [$data['toolurl']],
                    '',
                    'id, value'
                );
            foreach ($toolurls as $id => $value) {
                if ($value == $data['toolurl']) {
                    $ntypeid = $id;
                    break;
                }
            }
            if ($ntypeid === false) {
                $ntypeid = $DB->get_field('lti_types_config',
                                          'typeid',
                                          array(),
                                          IGNORE_MULTIPLE);

            }
            if ($ntypeid === false) {
                $ntypeid = 0;
            }
            $data['typeid'] = $ntypeid;
        }
        if (empty($data['servicesalt'])) {
            $data['servicesalt'] = uniqid('', true);
        }
        foreach ($data as $field => $value) {
            if (!in_array($field, $ignorefields)) {
                $this->xmlwriter->full_tag($field, $value);
            }
        }

        return $data;
    }

    /**
     * This is executed when we reach the closing </MOD> tag of our 'lti' path
     */
    public function on_basiclti_end() {
        // Finish writing basiclti.xml.
        $this->xmlwriter->end_tag('lti');
        $this->xmlwriter->end_tag('activity');
        $this->close_xml_writer();

        // Write inforef.xml.
        $this->open_xml_writer("activities/lti_{$this->moduleid}/inforef.xml");
        $this->xmlwriter->begin_tag('inforef');
        $this->xmlwriter->begin_tag('fileref');
        foreach ($this->fileman->get_fileids() as $fileid) {
            $this->write_xml('file', array('id' => $fileid));
        }
        $this->xmlwriter->end_tag('fileref');
        $this->xmlwriter->end_tag('inforef');
        $this->close_xml_writer();
    }

}

