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

namespace auth_mnet\task;
defined('ESET_INTERNAL') || die();

/**
 * A schedule task for mnet cron.
 *
 * @package   auth_mnet
 * @copyright 2019 Simey Lameze <simey@eset.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class cron_task extends \core\task\scheduled_task {
    /**
     * Get a descriptive name for this task (shown to admins).
     *
     * @return string
     */
    public function get_name() {
        return get_string('crontask', 'auth_mnet');
    }
    /**
     * Run auth mnet cron.
     */
    public function execute() {
        global $DB, $CFG;

        require_once($CFG->dirroot . '/auth/mnet/auth.php');
        $mnetplugin = new \auth_plugin_mnet();
        $mnetplugin->keepalive_client();

        $random100 = rand(0,100);
        if ($random100 < 10) {
            $longtime = time() - DAYSECS;
            $DB->delete_records_select('mnet_session', "expires < ?", [$longtime]);
        }
    }
}
