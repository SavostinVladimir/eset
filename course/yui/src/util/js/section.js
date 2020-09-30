/**
 * A collection of utility classes for use with course sections.
 *
 * @module eset-course-util
 * @submodule eset-course-util-section
 */

Y.namespace('Eset.core_course.util.section');

/**
 * A collection of utility classes for use with course sections.
 *
 * @class Eset.core_course.util.section
 * @static
 */
Y.Eset.core_course.util.section = {
    CONSTANTS: {
        SECTIONIDPREFIX: 'section-'
    },

    /**
     * Determines the section ID for the provided section.
     *
     * @method getId
     * @param section {Node} The section to find an ID for.
     * @return {Number|false} The ID of the section in question or false if no ID was found.
     */
    getId: function(section) {
        // We perform a simple substitution operation to get the ID.
        var id = section.get('id').replace(
                this.CONSTANTS.SECTIONIDPREFIX, '');

        // Attempt to validate the ID.
        id = parseInt(id, 10);
        if (typeof id === 'number' && isFinite(id)) {
            return id;
        }
        return false;
    }
};
