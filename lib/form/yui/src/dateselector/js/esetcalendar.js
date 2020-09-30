/**
 * Provides the Eset Calendar class.
 *
 * @module eset-form-dateselector
 */

/**
 * A class to overwrite the YUI3 Calendar in order to change the strings..
 *
 * @class M.form_esetcalendar
 * @constructor
 * @extends Calendar
 */
ESETCALENDAR = function() {
    ESETCALENDAR.superclass.constructor.apply(this, arguments);
};

Y.extend(ESETCALENDAR, Y.Calendar, {
        initializer: function(cfg) {
            this.set("strings.very_short_weekdays", cfg.WEEKDAYS_MEDIUM);
            this.set("strings.first_weekday", cfg.firstdayofweek);
        }
    }, {
        NAME: 'Calendar',
        ATTRS: {}
    }
);

M.form_esetcalendar = M.form_esetcalendar || {};
M.form_esetcalendar.initializer = function(params) {
    return new ESETCALENDAR(params);
};
