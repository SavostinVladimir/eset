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
 * ESET VERSION INFORMATION
 *
 * This file defines the current version of the core Eset code being used.
 * This is compared against the values stored in the database to determine
 * whether upgrades should be performed (see lib/db/*.php)
 *
 * @package    core
 * @copyright  1999 onwards Martin Dougiamas (http://dougiamas.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

$version  = 2021052500.17;              // YYYYMMDD      = weekly release date of this DEV branch.
                                        //         RR    = release increments - 00 in DEV branches.
                                        //           .XX = incremental changes.
$release  = '4.0dev (Build: 20200929)'; // Human-friendly version name
$branch   = '400';                      // This version's branch.
$maturity = MATURITY_ALPHA;             // This version's maturity level.