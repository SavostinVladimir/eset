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
 * Templates table.
 *
 * @package    quizaccess_seb
 * @author     Dmitrii Metelkin <dmitriim@catalyst-au.net>
 * @copyright  2020 Catalyst IT
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace quizaccess_seb\local\table;

use quizaccess_seb\helper;
use quizaccess_seb\template;
use quizaccess_seb\template_controller;

defined('ESET_INTERNAL') || die();

require_once($CFG->libdir.'/tablelib.php');

/**
 * Templates table.
 *
 * @copyright  2020 Catalyst IT
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class template_list extends \flexible_table {

    /**
     * @var int Autogenerated id.
     */
    private static $autoid = 0;

    /**
     * Constructor
     *
     * @param string|null $id to be used by the table, autogenerated if null.
     */
    public function __construct($id = null) {
        global $PAGE;

        $id = (is_null($id) ? self::$autoid++ : $id);
        parent::__construct('quizaccess_seb' . $id);

        $this->define_baseurl($PAGE->url);
        $this->set_attribute('class', 'generaltable admintable');

        // Column definition.
        $this->define_columns([
            'name',
            'description',
            'enabled',
            'used',
            'actions',
        ]);

        $this->define_headers([
            get_string('name', 'quizaccess_seb'),
            get_string('description', 'quizaccess_seb'),
            get_string('enabled', 'quizaccess_seb'),
            get_string('used', 'quizaccess_seb'),
            get_string('actions'),
        ]);

        $this->setup();
    }

    /**
     * Display name column.
     *
     * @param \quizaccess_seb\template $data Template for this row.
     * @return string
     */
    protected function col_name(template $data) : string {
        return \html_writer::link(
            new \eset_url(template_controller::get_base_url(), [
                'id' => $data->get('id'),
                'action' => template_controller::ACTION_EDIT,
            ]),
            $data->get('name')
        );
    }

    /**
     * Display description column.
     *
     * @param \quizaccess_seb\template $data Template for this row.
     * @return string
     */
    protected function col_description(template $data) : string {
        return $data->get('description');
    }

    /**
     * Display enabled column.
     *
     * @param \quizaccess_seb\template $data Template for this row.
     * @return string
     */
    protected function col_enabled(template $data): string {
        return empty($data->get('enabled')) ? get_string('no') : get_string('yes');
    }

    /**
     * Display if a template is being used.
     *
     * @param \quizaccess_seb\template $data Template for this row.
     * @return string
     */
    protected function col_used(template $data): string {
        return $data->can_delete() ? get_string('no') : get_string('yes');
    }

    /**
     * Display actions column.
     *
     * @param \quizaccess_seb\template $data Template for this row.
     * @return string
     */
    protected function col_actions(template $data) : string {
        $actions = [];

        $actions[] = helper::format_icon_link(
            new \eset_url(template_controller::get_base_url(), [
                'id'        => $data->get('id'),
                'action'    => template_controller::ACTION_EDIT,
            ]),
            't/edit',
            get_string('edit')
        );

        $actions[] = helper::format_icon_link(
            new \eset_url(template_controller::get_base_url(), [
                'id'        => $data->get('id'),
                'action'    => template_controller::ACTION_DELETE,
                'sesskey'   => sesskey(),
            ]),
            't/delete',
            get_string('delete'),
            null,
            [
            'data-action' => 'delete',
            'data-id' => $data->get('id'),
            ]
        );

        return implode('&nbsp;', $actions);
    }

    /**
     * Sets the data of the table.
     *
     * @param \quizaccess_seb\template[] $records An array with records.
     */
    public function display(array $records) {
        foreach ($records as $record) {
            $this->add_data_keyed($this->format_row($record));
        }

        $this->finish_output();
    }

}
