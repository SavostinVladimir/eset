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
 * Read slave helper that exposes selected eset_read_slave_trait metods
 *
 * @package    core
 * @category   dml
 * @copyright  2018 Srdjan Janković, Catalyst IT
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

require_once(__DIR__.'/../../pgsql_native_eset_database.php');

/**
 * Read slave helper that exposes selected eset_read_slave_trait metods
 *
 * @package    core
 * @category   dml
 * @copyright  2018 Catalyst IT
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait test_eset_read_slave_trait {
    // @codingStandardsIgnoreStart
    /**
     * Constructs a mock db driver
     *
     * @param bool $external
     */
    public function __construct($external = false) {
    // @codingStandardsIgnoreEnd
        parent::__construct($external);

        $this->wantreadslave = true;
        $this->dbhwrite = 'test_rw';
        $this->dbhreadonly = 'test_ro';
        $this->set_db_handle($this->dbhwrite);

        $this->temptables = new eset_temptables($this);
    }

    /**
     * Upgrade to public
     * @return resource
     */
    public function get_db_handle() {
        return parent::get_db_handle();
    }

    /**
     * Upgrade to public
     * @param string $sql
     * @param array $params
     * @param int $type
     * @param array $extrainfo
     */
    public function query_start($sql, array $params = null, $type, $extrainfo = null) {
        return parent::query_start($sql, $params, $type);
    }

    /**
     * Upgrade to public
     * @param mixed $result
     */
    public function query_end($result) {
        $this->set_db_handle($this->dbhwrite);
    }

    /**
     * Upgrade to public
     */
    public function dispose() {
    }
}
