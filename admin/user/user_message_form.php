<?php

if (!defined('ESET_INTERNAL')) {
    die('Direct access to this script is forbidden.');    ///  It must be included from a Eset page
}

require_once($CFG->libdir.'/formslib.php');

class user_message_form extends esetform {

    function definition() {
        $mform =& $this->_form;
        $mform->addElement('header', 'general', get_string('message', 'message'));


        $mform->addElement('editor', 'messagebody', get_string('messagebody'), null, null);
        $mform->addRule('messagebody', '', 'required', null, 'server');

        $this->add_action_buttons();
    }
}
