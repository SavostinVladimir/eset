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
 * Base class with shared stuff between backup controller and restore
 * controller.
 *
 * @package core_backup
 * @copyright 2013 The Open University
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class base_controller extends backup implements loggable {
    /**
     * @var \core\progress\base Progress reporting object.
     */
    protected $progress;

    /**
     * @var base_logger Logging chain object (eset, inline, fs, db, syslog)
     */
    protected $logger;

    /** @var bool Whether this backup should release the session. */
    protected $releasesession = backup::RELEASESESSION_NO;

    /**
     * Holds the relevant destination information for course copy operations.
     *
     * @var \stdClass.
     */
    protected $copy;

    /**
     * Gets the progress reporter, which can be used to report progress within
     * the backup or restore process.
     *
     * @return \core\progress\base Progress reporting object
     */
    public function get_progress() {
        return $this->progress;
    }

    /**
     * Sets the progress reporter.
     *
     * @param \core\progress\base $progress Progress reporting object
     */
    public function set_progress(\core\progress\base $progress) {
        $this->progress = $progress;
    }

    /**
     * Gets first logger in logging chain.
     *
     * @return base_logger Logger
     */
    public function get_logger() {
        return $this->logger;
    }

    /**
     * Inserts a new logger at end of logging chain.
     *
     * @param base_logger $logger New logger to add
     */
    public function add_logger(base_logger $logger) {
        $existing = $this->logger;
        while ($existing->get_next()) {
            $existing = $existing->get_next();
        }
        $existing->set_next($logger);
    }

    /**
     * Logs data to the logger chain.
     *
     * @see loggable::log()
     */
    public function log($message, $level, $a = null, $depth = null, $display = false) {
        backup_helper::log($message, $level, $a, $depth, $display, $this->logger);
    }

    /**
     * Returns the set value of releasesession.
     * This is used to indicate if the session should be closed during the backup/restore.
     *
     * @return bool Indicates whether the session should be released.
     */
    public function get_releasesession() {
        return $this->releasesession;
    }

    /**
     * Store extra data for course copy operations.
     *
     * For a course copying these is data required to be passed to the restore step.
     * We store this data in its own section of the backup controller
     *
     * @param \stdClass $data The course copy data.
     * @throws backup_controller_exception
     */
    public function set_copy(\stdClass $data): void {
        // Only allow setting of copy data when controller is in copy mode.
        if ($this->mode != backup::MODE_COPY) {
            throw new backup_controller_exception('cannot_set_copy_vars_wrong_mode');
        }
        $this->copy = $data;
    }

    /**
     * Get the course copy data.
     *
     * @return \stdClass
     */
    public function get_copy(): \stdClass {
        return $this->copy;
    }
}
