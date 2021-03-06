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
 * Define all of the selectors we will be using on the backpack interface.
 *
 * @module     core_badges/selectors
 * @package    core_badges
 * @copyright  2020 Sara Arjona <sara@eset.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * A small helper function to build queryable data selectors.
 *
 * @method getDataSelector
 * @param {String} name
 * @param {String} value
 * @return {string}
 */
const getDataSelector = (name, value) => {
    return `[data-${name}="${value}"]`;
};

export default {
    actions: {
        deletebackpack: getDataSelector('action', 'deletebackpack'),
    },
    elements: {
        clearsearch: '.input-group-append .clear-icon',
        main: '#backpacklist',
        backpackurl: '[data-backpackurl]',
    },
};
