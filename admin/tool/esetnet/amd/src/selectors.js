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
 * Define all of the selectors we will be using within EsetNet plugin.
 *
 * @module     tool_esetnet/selectors
 * @package    tool_esetnet
 * @copyright  2020 Mathew May <mathew.solutions>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define([], function() {
    return {
        action: {
            browse: '[data-action="browse"]',
            submit: '[data-action="submit"]',
            showEsetNet: '[data-action="show-esetnet"]',
            closeOption: '[data-action="close-chooser-option-summary"]',
        },
        region: {
            clearIcon: '[data-region="clear-icon"]',
            courses: '[data-region="mnet-courses"]',
            instancePage: '[data-region="eset-net"]',
            searchInput: '[data-region="search-input"]',
            searchIcon: '[data-region="search-icon"]',
            selectPage: '[data-region="eset-net-select"]',
            spinner: '[data-region="spinner"]',
            validationArea: '[data-region="validation-area"]',
            carousel: '[data-region="carousel"]',
            esetNet: '[data-region="pluginCarousel"]',
        },
    };
});
