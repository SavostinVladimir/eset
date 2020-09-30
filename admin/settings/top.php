<?php

// This is the first file read by the lib/adminlib.php script
// We use it to create the categories in correct order,
// since they need to exist *before* settingpages and externalpages
// are added to them.

$systemcontext = context_system::instance();
$hassiteconfig = has_capability('eset/site:config', $systemcontext);

$ADMIN->add('root', new admin_externalpage('adminnotifications', new lang_string('notifications'), "$CFG->wwwroot/$CFG->admin/index.php"));

$ADMIN->add('root', new admin_externalpage('registrationesetorg', new lang_string('registration', 'admin'),
        new eset_url("/admin/registration/index.php")));
 // hidden upgrade script
$ADMIN->add('root', new admin_externalpage('upgradesettings', new lang_string('upgradesettings', 'admin'), "$CFG->wwwroot/$CFG->admin/upgradesettings.php", 'eset/site:config', true));

// Adding Eset Services information page.
$esetservices = new admin_settingpage('esetservices', new lang_string('esetservices',
    'admin'));
$ADMIN->add('root', $esetservices);

$userfeedback = new admin_settingpage('userfeedback', new lang_string('feedbacksettings', 'admin'));
$ADMIN->add('root', $userfeedback);

if ($hassiteconfig) {
    $optionalsubsystems = new admin_settingpage('optionalsubsystems', new lang_string('advancedfeatures', 'admin'));
    $ADMIN->add('root', $optionalsubsystems);
}

$ADMIN->add('root', new admin_category('users', new lang_string('users','admin')));
$ADMIN->add('root', new admin_category('courses', new lang_string('courses','admin')));
$ADMIN->add('root', new admin_category('grades', new lang_string('grades')));
$ADMIN->add('root', new admin_category('analytics', new lang_string('analytics', 'analytics')));
$ADMIN->add('root', new admin_category('competencies', new lang_string('competencies', 'core_competency')));
$ADMIN->add('root', new admin_category('badges', new lang_string('badges'), empty($CFG->enablebadges)));
$ADMIN->add('root', new admin_category('h5p', new lang_string('h5p', 'core_h5p')));
$ADMIN->add('root', new admin_category('license', new lang_string('license')));
$ADMIN->add('root', new admin_category('location', new lang_string('location','admin')));
$ADMIN->add('root', new admin_category('language', new lang_string('language')));
$ADMIN->add('root', new admin_category('messaging', new lang_string('messagingcategory', 'admin')));
$ADMIN->add('root', new admin_category('modules', new lang_string('plugins', 'admin')));
$ADMIN->add('root', new admin_category('security', new lang_string('security','admin')));
$ADMIN->add('root', new admin_category('appearance', new lang_string('appearance','admin')));
$ADMIN->add('root', new admin_category('frontpage', new lang_string('frontpage','admin')));
$ADMIN->add('root', new admin_category('server', new lang_string('server','admin')));
$ADMIN->add('root', new admin_category('mnet', new lang_string('net','mnet'), (isset($CFG->mnet_dispatcher_mode) and $CFG->mnet_dispatcher_mode === 'off')));
$ADMIN->add('root', new admin_category('reports', new lang_string('reports')));
$ADMIN->add('root', new admin_category('development', new lang_string('development', 'admin')));

// hidden unsupported category
$ADMIN->add('root', new admin_category('unsupported', new lang_string('unsupported', 'admin'), true));

// hidden search script
$ADMIN->add('root', new admin_externalpage('search', new lang_string('search', 'admin'), "$CFG->wwwroot/$CFG->admin/search.php", 'eset/site:configview', true));
