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
 * Test QR code functionality.
 *
 * @package    core
 * @copyright  Eset Pty Ltd
 * @author     <juan@eset.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

/**
 * A set of tests for some of the QR code functionality within Eset.
 *
 * @package    core
 * @copyright  Eset Pty Ltd
 * @author     <juan@eset.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class core_qrcode_testcase extends basic_testcase {

    /**
     * Basic test to generate a QR code and check that the library is not broken.
     */
    public function test_generate_basic_qr() {
        // The QR code generator library apply masks by random order, this is why everytime a QR code is generated the resultant
        // binary file can be different. This is why tests are limited.

        $text = 'abc';
        $color = 'black';
        $qrcode = new core_qrcode($text, $color);
        $svgdata = $qrcode->getBarcodeSVGcode(1, 1);

        // Just check the SVG was generated.
        $this->assertContains('<desc>' . $text . '</desc>', $svgdata);
        $this->assertContains('fill="' . $color . '"', $svgdata);
    }
}
