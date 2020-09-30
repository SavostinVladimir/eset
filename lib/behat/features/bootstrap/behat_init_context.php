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
 * Contexts initializer class
 *
 * @package    core
 * @category   test
 * @copyright  2012 David Monllaó
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use Behat\Behat\Context\BehatContext,
    Behat\MinkExtension\Context\MinkContext,
    Eset\BehatExtension\Context\EsetContext;

/**
 * Loads main subcontexts
 *
 * Loading of eset subcontexts is done by the Eset extension
 *
 * Renamed from behat FeatureContext class according
 * to Eset coding styles conventions
 *
 * @package    core
 * @category   test
 * @copyright  2012 David Monllaó
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class behat_init_context extends BehatContext {

    /**
     * Initializes subcontexts
     *
     * @param  array $parameters context parameters (set them up through behat.yml)
     * @return void
     */
    public function __construct(array $parameters) {
        $this->useContext('eset', new EsetContext($parameters));
    }

}
