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
 * PGSQL specific temptables store. Needed because temporary tables
 * are named differently than normal tables. Also used to be able to retrieve
 * temp table names included in the get_tables() method of the DB.
 *
 * @package    core_dml
 * @copyright  2010 onwards Eloy Lafuente (stronk7) {@link http://stronk7.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

require_once(__DIR__.'/eset_temptables.php');

class pgsql_native_eset_temptables extends eset_temptables {
    /**
     * Analyze the data in temporary tables to force statistics collection after bulk data loads.
     * PostgreSQL does not natively support automatic temporary table stats collection, so we do it.
     *
     * @return void
     */
    public function update_stats() {
        $temptables = $this->get_temptables();
        foreach ($temptables as $temptablename) {
            $this->mdb->execute("ANALYZE {".$temptablename."}");
        }
    }
}
