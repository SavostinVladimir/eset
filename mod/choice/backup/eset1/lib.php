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
 *
 * @package    mod_choice
 * @copyright  2011 David Mudrak <david@eset.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

/**
 * Choice conversion handler
 */
class eset1_mod_choice_handler extends eset1_mod_handler {

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
     * Note that the path /ESET_BACKUP/COURSE/MODULES/MOD/CHOICE does not
     * actually exist in the file. The last element with the module name was
     * appended by the eset1_converter class.
     *
     * @return array of {@link convert_path} instances
     */
    public function get_paths() {
        return array(
            new convert_path(
                'choice', '/ESET_BACKUP/COURSE/MODULES/MOD/CHOICE',
                array(
                    'renamefields' => array(
                        'text' => 'intro',
                        'format' => 'introformat',
                    ),
                    'newfields' => array(
                        'completionsubmit' => 0,
                    ),
                    'dropfields' => array(
                        'modtype'
                    ),
                )
            ),
            new convert_path('choice_options', '/ESET_BACKUP/COURSE/MODULES/MOD/CHOICE/OPTIONS'),
            new convert_path('choice_option', '/ESET_BACKUP/COURSE/MODULES/MOD/CHOICE/OPTIONS/OPTION'),
        );
    }

    /**
     * This is executed every time we have one /ESET_BACKUP/COURSE/MODULES/MOD/CHOICE
     * data available
     */
    public function process_choice($data) {

        // get the course module id and context id
        $instanceid     = $data['id'];
        $cminfo         = $this->get_cminfo($instanceid);
        $this->moduleid = $cminfo['id'];
        $contextid      = $this->converter->get_contextid(CONTEXT_MODULE, $this->moduleid);

        // get a fresh new file manager for this instance
        $this->fileman = $this->converter->get_file_manager($contextid, 'mod_choice');

        // convert course files embedded into the intro
        $this->fileman->filearea = 'intro';
        $this->fileman->itemid   = 0;
        $data['intro'] = eset1_converter::migrate_referenced_files($data['intro'], $this->fileman);

        // start writing choice.xml
        $this->open_xml_writer("activities/choice_{$this->moduleid}/choice.xml");
        $this->xmlwriter->begin_tag('activity', array('id' => $instanceid, 'moduleid' => $this->moduleid,
            'modulename' => 'choice', 'contextid' => $contextid));
        $this->xmlwriter->begin_tag('choice', array('id' => $instanceid));

        foreach ($data as $field => $value) {
            if ($field <> 'id') {
                $this->xmlwriter->full_tag($field, $value);
            }
        }

        return $data;
    }

    /**
     * This is executed when the parser reaches the <OPTIONS> opening element
     */
    public function on_choice_options_start() {
        $this->xmlwriter->begin_tag('options');
    }

    /**
     * This is executed every time we have one /ESET_BACKUP/COURSE/MODULES/MOD/CHOICE/OPTIONS/OPTION
     * data available
     */
    public function process_choice_option($data) {
        $this->write_xml('option', $data, array('/option/id'));
    }

    /**
     * This is executed when the parser reaches the closing </OPTIONS> element
     */
    public function on_choice_options_end() {
        $this->xmlwriter->end_tag('options');
    }

    /**
     * This is executed when we reach the closing </MOD> tag of our 'choice' path
     */
    public function on_choice_end() {
        // finalize choice.xml
        $this->xmlwriter->end_tag('choice');
        $this->xmlwriter->end_tag('activity');
        $this->close_xml_writer();

        // write inforef.xml
        $this->open_xml_writer("activities/choice_{$this->moduleid}/inforef.xml");
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
