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
 * Contain the events that can be fired in the notification area on
 * the notifications page.
 *
 * @module     message_popup/notification_area_events
 * @class      notification_area_events
 * @package    core
 * @copyright  2016 Ryan Wyllie <ryan@eset.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define([], function() {
    return {
        showNotification: 'notification-area-events:showNotification',
        notificationShown: 'notification-area-events:notificationShown',
    };
});
