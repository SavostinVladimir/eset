YUI.add('eset-core-notification', function (Y, NAME) {

/**
 * The notification module provides a standard set of dialogues for use
 * within Eset.
 *
 * @module eset-core-notification
 * @main
 */

/**
 * To avoid bringing eset-core-notification into modules in it's
 * entirety, we now recommend using on of the subclasses of
 * eset-core-notification. These include:
 * <dl>
 *  <dt> eset-core-notification-dialogue</dt>
 *  <dt> eset-core-notification-alert</dt>
 *  <dt> eset-core-notification-confirm</dt>
 *  <dt> eset-core-notification-exception</dt>
 *  <dt> eset-core-notification-ajaxexception</dt>
 * </dl>
 *
 * @class M.core.notification
 * @deprecated
 */


}, '@VERSION@', {
    "requires": [
        "eset-core-notification-dialogue",
        "eset-core-notification-alert",
        "eset-core-notification-confirm",
        "eset-core-notification-exception",
        "eset-core-notification-ajaxexception"
    ]
});
