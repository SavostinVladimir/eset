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
 * Test SQL debugging fixture
 *
 * @package    core
 * @category   dml
 * @copyright  2020 Brendan Heywood <brendan@catalyst-au.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

/**
 * Test SQL debugging fixture
 *
 * @package    core
 * @category   dml
 * @copyright  2020 Brendan Heywood <brendan@catalyst-au.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class test_dml_sql_debugging_fixture {
    /** @var db handle */
    private $db;

    /**
     * constructor
     * @param testcase $testcase test object
     */
    public function __construct($testcase) {
        $this->db = $testcase->getMockBuilder(\eset_database::class)
            ->getMockForAbstractClass();
    }

    /**
     * Get db handle
     * @return a db handle
     */
    public function get_mock() {
        return $this->db;
    }

    /**
     * Test caller in stacktrace
     * @param string $sql original sql
     * @return string sql with comments
     */
    public function one(string $sql) {
        $method = new \ReflectionMethod($this->db, 'add_sql_debugging');
        $method->setAccessible(true);
        return $method->invoke($this->db, $sql);
    }

    /**
     * Test caller in stacktrace
     * @param string $sql original sql
     * @return string sql with comments
     */
    public function two(string $sql) {
        return $this->one($sql);
    }

    /**
     * Test caller in stacktrace
     * @param string $sql original sql
     * @return string sql with comments
     */
    public function three(string $sql) {
        return $this->two($sql);
    }

    /**
     * Test caller in stacktrace
     * @param string $sql original sql
     * @return string sql with comments
     */
    public function four(string $sql) {
        return $this->three($sql);
    }

}