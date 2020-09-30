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
 * External learning plans webservice API tests.
 *
 * @package tool_lp
 * @copyright 2015 Damyon Wiese
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

global $CFG;

require_once($CFG->dirroot . '/webservice/tests/helpers.php');

use core_competency\api;
use tool_lp\external;
use core_competency\invalid_persistent_exception;
use core_competency\plan;
use core_competency\related_competency;
use core_competency\user_competency;
use core_competency\user_competency_plan;
use core_competency\plan_competency;
use core_competency\template;
use core_competency\template_competency;
use core_competency\course_competency_settings;

/**
 * External learning plans webservice API tests.
 *
 * @package tool_lp
 * @copyright 2015 Damyon Wiese
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class tool_lp_external_testcase extends externallib_advanced_testcase {

    /** @var stdClass $creator User with enough permissions to create insystem context. */
    protected $creator = null;

    /** @var stdClass $catcreator User with enough permissions to create incategory context. */
    protected $catcreator = null;

    /** @var stdClass $category Category */
    protected $category = null;

    /** @var stdClass $category Category */
    protected $othercategory = null;

    /** @var stdClass $user User with enough permissions to view insystem context */
    protected $user = null;

    /** @var stdClass $catuser User with enough permissions to view incategory context */
    protected $catuser = null;

    /** @var int Creator role id */
    protected $creatorrole = null;

    /** @var int User role id */
    protected $userrole = null;

    /**
     * Setup function- we will create a course and add an assign instance to it.
     */
    protected function setUp() {
        global $DB, $CFG;

        $this->resetAfterTest(true);

        // Create some users.
        $creator = $this->getDataGenerator()->create_user();
        $user = $this->getDataGenerator()->create_user();
        $catuser = $this->getDataGenerator()->create_user();
        $catcreator = $this->getDataGenerator()->create_user();
        $category = $this->getDataGenerator()->create_category();
        $othercategory = $this->getDataGenerator()->create_category();
        $syscontext = context_system::instance();
        $catcontext = context_coursecat::instance($category->id);

        // Fetching default authenticated user role.
        $authrole = $DB->get_record('role', array('id' => $CFG->defaultuserroleid));

        // Reset all default authenticated users permissions.
        unassign_capability('eset/competency:competencygrade', $authrole->id);
        unassign_capability('eset/competency:competencymanage', $authrole->id);
        unassign_capability('eset/competency:competencyview', $authrole->id);
        unassign_capability('eset/competency:planmanage', $authrole->id);
        unassign_capability('eset/competency:planmanagedraft', $authrole->id);
        unassign_capability('eset/competency:planmanageown', $authrole->id);
        unassign_capability('eset/competency:planview', $authrole->id);
        unassign_capability('eset/competency:planviewdraft', $authrole->id);
        unassign_capability('eset/competency:planviewown', $authrole->id);
        unassign_capability('eset/competency:planviewowndraft', $authrole->id);
        unassign_capability('eset/competency:templatemanage', $authrole->id);
        unassign_capability('eset/competency:templateview', $authrole->id);
        unassign_capability('eset/cohort:manage', $authrole->id);
        unassign_capability('eset/competency:coursecompetencyconfigure', $authrole->id);

        // Creating specific roles.
        $this->creatorrole = create_role('Creator role', 'lpcreatorrole', 'learning plan creator role description');
        $this->userrole = create_role('User role', 'lpuserrole', 'learning plan user role description');

        assign_capability('eset/competency:competencymanage', CAP_ALLOW, $this->creatorrole, $syscontext->id);
        assign_capability('eset/competency:coursecompetencyconfigure', CAP_ALLOW, $this->creatorrole, $syscontext->id);
        assign_capability('eset/competency:planmanage', CAP_ALLOW, $this->creatorrole, $syscontext->id);
        assign_capability('eset/competency:planmanagedraft', CAP_ALLOW, $this->creatorrole, $syscontext->id);
        assign_capability('eset/competency:planmanageown', CAP_ALLOW, $this->creatorrole, $syscontext->id);
        assign_capability('eset/competency:planview', CAP_ALLOW, $this->creatorrole, $syscontext->id);
        assign_capability('eset/competency:planviewdraft', CAP_ALLOW, $this->creatorrole, $syscontext->id);
        assign_capability('eset/competency:templatemanage', CAP_ALLOW, $this->creatorrole, $syscontext->id);
        assign_capability('eset/competency:competencygrade', CAP_ALLOW, $this->creatorrole, $syscontext->id);
        assign_capability('eset/cohort:manage', CAP_ALLOW, $this->creatorrole, $syscontext->id);

        assign_capability('eset/competency:competencyview', CAP_ALLOW, $this->userrole, $syscontext->id);
        assign_capability('eset/competency:templateview', CAP_ALLOW, $this->userrole, $syscontext->id);
        assign_capability('eset/competency:planviewown', CAP_ALLOW, $this->userrole, $syscontext->id);
        assign_capability('eset/competency:planviewowndraft', CAP_ALLOW, $this->userrole, $syscontext->id);

        role_assign($this->creatorrole, $creator->id, $syscontext->id);
        role_assign($this->creatorrole, $catcreator->id, $catcontext->id);
        role_assign($this->userrole, $user->id, $syscontext->id);
        role_assign($this->userrole, $catuser->id, $catcontext->id);

        $this->creator = $creator;
        $this->catcreator = $catcreator;
        $this->user = $user;
        $this->catuser = $catuser;
        $this->category = $category;
        $this->othercategory = $othercategory;

        accesslib_clear_all_caches_for_unit_testing();
    }

    public function test_search_users_by_capability() {
        global $CFG;
        $this->resetAfterTest(true);

        $dg = $this->getDataGenerator();
        $ux = $dg->create_user();
        $u1 = $dg->create_user(array('idnumber' => 'Cats', 'firstname' => 'Bob', 'lastname' => 'Dyyylan',
            'email' => 'bobbyyy@dyyylan.com', 'phone1' => '123456', 'phone2' => '78910', 'department' => 'Marketing',
            'institution' => 'HQ'));

        // First we search with no capability assigned.
        $this->setUser($ux);
        $result = external::search_users('yyylan', 'eset/competency:planmanage');
        $result = external_api::clean_returnvalue(external::search_users_returns(), $result);
        $this->assertCount(0, $result['users']);
        $this->assertEquals(0, $result['count']);

        // Now we assign a different capability.
        $usercontext = context_user::instance($u1->id);
        $systemcontext = context_system::instance();
        $customrole = $this->assignUserCapability('eset/competency:planview', $usercontext->id);

        $result = external::search_users('yyylan', 'eset/competency:planmanage');
        $result = external_api::clean_returnvalue(external::search_users_returns(), $result);
        $this->assertCount(0, $result['users']);
        $this->assertEquals(0, $result['count']);

        // Now we assign a matching capability in the same role.
        $usercontext = context_user::instance($u1->id);
        $this->assignUserCapability('eset/competency:planmanage', $usercontext->id, $customrole);

        $result = external::search_users('yyylan', 'eset/competency:planmanage');
        $result = external_api::clean_returnvalue(external::search_users_returns(), $result);
        $this->assertCount(1, $result['users']);
        $this->assertEquals(1, $result['count']);

        // Now assign another role with the same capability (test duplicates).
        role_assign($this->creatorrole, $ux->id, $usercontext->id);
        $result = external::search_users('yyylan', 'eset/competency:planmanage');
        $result = external_api::clean_returnvalue(external::search_users_returns(), $result);
        $this->assertCount(1, $result['users']);
        $this->assertEquals(1, $result['count']);

        // Now lets try a different user with only the role at system level.
        $ux2 = $dg->create_user();
        role_assign($this->creatorrole, $ux2->id, $systemcontext->id);
        $this->setUser($ux2);
        $result = external::search_users('yyylan', 'eset/competency:planmanage');
        $result = external_api::clean_returnvalue(external::search_users_returns(), $result);
        $this->assertCount(1, $result['users']);
        $this->assertEquals(1, $result['count']);

        // Now lets try a different user with only the role at user level.
        $ux3 = $dg->create_user();
        role_assign($this->creatorrole, $ux3->id, $usercontext->id);
        $this->setUser($ux3);
        $result = external::search_users('yyylan', 'eset/competency:planmanage');
        $result = external_api::clean_returnvalue(external::search_users_returns(), $result);
        $this->assertCount(1, $result['users']);
        $this->assertEquals(1, $result['count']);

        // Switch back.
        $this->setUser($ux);

        // Now add a prevent override (will change nothing because we still have an ALLOW).
        assign_capability('eset/competency:planmanage', CAP_PREVENT, $customrole, $usercontext->id);
        $result = external::search_users('yyylan', 'eset/competency:planmanage');
        $result = external_api::clean_returnvalue(external::search_users_returns(), $result);
        $this->assertCount(1, $result['users']);
        $this->assertEquals(1, $result['count']);

        // Now change to a prohibit override (should prevent access).
        assign_capability('eset/competency:planmanage', CAP_PROHIBIT, $customrole, $usercontext->id);
        $result = external::search_users('yyylan', 'eset/competency:planmanage');
        $result = external_api::clean_returnvalue(external::search_users_returns(), $result);
        $this->assertCount(1, $result['users']);
        $this->assertEquals(1, $result['count']);

    }

    /**
     * Ensures that overrides, as well as system permissions, are respected.
     */
    public function test_search_users_by_capability_the_comeback() {
        $this->resetAfterTest();
        $dg = $this->getDataGenerator();

        $master = $dg->create_user();
        $manager = $dg->create_user();
        $slave1 = $dg->create_user(array('lastname' => 'ESETR'));
        $slave2 = $dg->create_user(array('lastname' => 'ESETR'));
        $slave3 = $dg->create_user(array('lastname' => 'ESETR'));

        $syscontext = context_system::instance();
        $slave1context = context_user::instance($slave1->id);
        $slave2context = context_user::instance($slave2->id);
        $slave3context = context_user::instance($slave3->id);

        // Creating a role giving the site config.
        $roleid = $dg->create_role();
        assign_capability('eset/site:config', CAP_ALLOW, $roleid, $syscontext->id, true);

        // Create a role override for slave 2.
        assign_capability('eset/site:config', CAP_PROHIBIT, $roleid, $slave2context->id, true);

        // Assigning the role.
        // Master -> System context.
        // Manager -> User context.
        role_assign($roleid, $master->id, $syscontext);
        role_assign($roleid, $manager->id, $slave1context);

        // Flush accesslib.
        accesslib_clear_all_caches_for_unit_testing();

        // Confirm.
        // Master has system permissions.
        $this->setUser($master);
        $this->assertTrue(has_capability('eset/site:config', $syscontext));
        $this->assertTrue(has_capability('eset/site:config', $slave1context));
        $this->assertFalse(has_capability('eset/site:config', $slave2context));
        $this->assertTrue(has_capability('eset/site:config', $slave3context));

        // Manager only has permissions in slave 1.
        $this->setUser($manager);
        $this->assertFalse(has_capability('eset/site:config', $syscontext));
        $this->assertTrue(has_capability('eset/site:config', $slave1context));
        $this->assertFalse(has_capability('eset/site:config', $slave2context));
        $this->assertFalse(has_capability('eset/site:config', $slave3context));

        // Now do the test.
        $this->setUser($master);
        $result = external::search_users('ESETR', 'eset/site:config');
        $this->assertCount(2, $result['users']);
        $this->assertEquals(2, $result['count']);
        $this->assertArrayHasKey($slave1->id, $result['users']);
        $this->assertArrayHasKey($slave3->id, $result['users']);

        $this->setUser($manager);
        $result = external::search_users('ESETR', 'eset/site:config');
        $this->assertCount(1, $result['users']);
        $this->assertEquals(1, $result['count']);
        $this->assertArrayHasKey($slave1->id, $result['users']);
    }

    public function test_search_users() {
        global $CFG;
        $this->resetAfterTest(true);

        $dg = $this->getDataGenerator();
        $ux = $dg->create_user();
        $u1 = $dg->create_user(array('idnumber' => 'Cats', 'firstname' => 'Bob', 'lastname' => 'Dyyylan',
            'email' => 'bobbyyy@dyyylan.com', 'phone1' => '123456', 'phone2' => '78910', 'department' => 'Marketing',
            'institution' => 'HQ'));
        $u2 = $dg->create_user(array('idnumber' => 'Dogs', 'firstname' => 'Alice', 'lastname' => 'Dyyylan',
            'email' => 'alyyyson@dyyylan.com', 'phone1' => '33333', 'phone2' => '77777', 'department' => 'Development',
            'institution' => 'O2'));
        $u3 = $dg->create_user(array('idnumber' => 'Fish', 'firstname' => 'Thomas', 'lastname' => 'Xow',
            'email' => 'fishyyy@eset.com', 'phone1' => '77777', 'phone2' => '33333', 'department' => 'Research',
            'institution' => 'Bob'));

        // We need to give the user the capability we are searching for on each of the test users.
        $this->setAdminUser();
        $usercontext = context_user::instance($u1->id);
        $dummyrole = $this->assignUserCapability('eset/competency:planmanage', $usercontext->id);
        $usercontext = context_user::instance($u2->id);
        $this->assignUserCapability('eset/competency:planmanage', $usercontext->id, $dummyrole);
        $usercontext = context_user::instance($u3->id);
        $this->assignUserCapability('eset/competency:planmanage', $usercontext->id, $dummyrole);

        $this->setUser($ux);
        $usercontext = context_user::instance($u1->id);
        $this->assignUserCapability('eset/competency:planmanage', $usercontext->id, $dummyrole);
        $usercontext = context_user::instance($u2->id);
        $this->assignUserCapability('eset/competency:planmanage', $usercontext->id, $dummyrole);
        $usercontext = context_user::instance($u3->id);
        $this->assignUserCapability('eset/competency:planmanage', $usercontext->id, $dummyrole);

        $this->setAdminUser();

        // No identity fields.
        $CFG->showuseridentity = '';
        $result = external::search_users('cats', 'eset/competency:planmanage');
        $result = external_api::clean_returnvalue(external::search_users_returns(), $result);
        $this->assertCount(0, $result['users']);
        $this->assertEquals(0, $result['count']);

        // Filter by name.
        $CFG->showuseridentity = '';
        $result = external::search_users('dyyylan', 'eset/competency:planmanage');
        $result = external_api::clean_returnvalue(external::search_users_returns(), $result);
        $this->assertCount(2, $result['users']);
        $this->assertEquals(2, $result['count']);
        $this->assertEquals($u2->id, $result['users'][0]['id']);
        $this->assertEquals($u1->id, $result['users'][1]['id']);

        // Filter by institution and name.
        $CFG->showuseridentity = 'institution';
        $result = external::search_users('bob', 'eset/competency:planmanage');
        $result = external_api::clean_returnvalue(external::search_users_returns(), $result);
        $this->assertCount(2, $result['users']);
        $this->assertEquals(2, $result['count']);
        $this->assertEquals($u1->id, $result['users'][0]['id']);
        $this->assertEquals($u3->id, $result['users'][1]['id']);

        // Filter by id number.
        $CFG->showuseridentity = 'idnumber';
        $result = external::search_users('cats', 'eset/competency:planmanage');
        $result = external_api::clean_returnvalue(external::search_users_returns(), $result);
        $this->assertCount(1, $result['users']);
        $this->assertEquals(1, $result['count']);
        $this->assertEquals($u1->id, $result['users'][0]['id']);
        $this->assertEquals($u1->idnumber, $result['users'][0]['idnumber']);
        $this->assertEmpty($result['users'][0]['email']);
        $this->assertEmpty($result['users'][0]['phone1']);
        $this->assertEmpty($result['users'][0]['phone2']);
        $this->assertEmpty($result['users'][0]['department']);
        $this->assertEmpty($result['users'][0]['institution']);

        // Filter by email.
        $CFG->showuseridentity = 'email';
        $result = external::search_users('yyy', 'eset/competency:planmanage');
        $result = external_api::clean_returnvalue(external::search_users_returns(), $result);
        $this->assertCount(3, $result['users']);
        $this->assertEquals(3, $result['count']);
        $this->assertEquals($u2->id, $result['users'][0]['id']);
        $this->assertEquals($u2->email, $result['users'][0]['email']);
        $this->assertEquals($u1->id, $result['users'][1]['id']);
        $this->assertEquals($u1->email, $result['users'][1]['email']);
        $this->assertEquals($u3->id, $result['users'][2]['id']);
        $this->assertEquals($u3->email, $result['users'][2]['email']);

        // Filter by any.
        $CFG->showuseridentity = 'idnumber,email,phone1,phone2,department,institution';
        $result = external::search_users('yyy', 'eset/competency:planmanage');
        $result = external_api::clean_returnvalue(external::search_users_returns(), $result);
        $this->assertCount(3, $result['users']);
        $this->assertEquals(3, $result['count']);
        $this->assertArrayHasKey('idnumber', $result['users'][0]);
        $this->assertArrayHasKey('email', $result['users'][0]);
        $this->assertArrayHasKey('phone1', $result['users'][0]);
        $this->assertArrayHasKey('phone2', $result['users'][0]);
        $this->assertArrayHasKey('department', $result['users'][0]);
        $this->assertArrayHasKey('institution', $result['users'][0]);

        // Switch to a user that cannot view identity fields.
        $this->setUser($ux);
        $CFG->showuseridentity = 'idnumber,email,phone1,phone2,department,institution';

        // Only names are included.
        $result = external::search_users('fish');
        $result = external_api::clean_returnvalue(external::search_users_returns(), $result);
        $this->assertCount(0, $result['users']);
        $this->assertEquals(0, $result['count']);

        $result = external::search_users('bob', 'eset/competency:planmanage');
        $result = external_api::clean_returnvalue(external::search_users_returns(), $result);
        $this->assertCount(1, $result['users']);
        $this->assertEquals(1, $result['count']);
        $this->assertEquals($u1->id, $result['users'][0]['id']);
        $this->assertEmpty($result['users'][0]['idnumber']);
        $this->assertEmpty($result['users'][0]['email']);
        $this->assertEmpty($result['users'][0]['phone1']);
        $this->assertEmpty($result['users'][0]['phone2']);
        $this->assertEmpty($result['users'][0]['department']);
        $this->assertEmpty($result['users'][0]['institution']);
    }

    public function test_data_for_user_competency_summary_in_plan() {
        global $CFG;

        $this->setUser($this->creator);

        $dg = $this->getDataGenerator();
        $lpg = $dg->get_plugin_generator('core_competency');

        $f1 = $lpg->create_framework();

        $c1 = $lpg->create_competency(array('competencyframeworkid' => $f1->get('id')));

        $tpl = $lpg->create_template();
        $lpg->create_template_competency(array('templateid' => $tpl->get('id'), 'competencyid' => $c1->get('id')));

        $plan = $lpg->create_plan(array('userid' => $this->user->id, 'templateid' => $tpl->get('id'), 'name' => 'Evil'));

        $uc = $lpg->create_user_competency(array('userid' => $this->user->id, 'competencyid' => $c1->get('id')));

        $evidence = \core_competency\external::grade_competency_in_plan($plan->get('id'), $c1->get('id'), 1, true);
        $evidence = \core_competency\external::grade_competency_in_plan($plan->get('id'), $c1->get('id'), 2, true);

        $summary = external::data_for_user_competency_summary_in_plan($c1->get('id'), $plan->get('id'));
        $this->assertTrue($summary->usercompetencysummary->cangrade);
        $this->assertEquals('Evil', $summary->plan->name);
        $this->assertEquals('B', $summary->usercompetencysummary->usercompetency->gradename);
        $this->assertEquals('B', $summary->usercompetencysummary->evidence[0]->gradename);
        $this->assertEquals('A', $summary->usercompetencysummary->evidence[1]->gradename);
    }

    public function test_data_for_user_competency_summary() {
        $this->setUser($this->creator);

        $dg = $this->getDataGenerator();
        $lpg = $dg->get_plugin_generator('core_competency');
        $f1 = $lpg->create_framework();
        $c1 = $lpg->create_competency(array('competencyframeworkid' => $f1->get('id')));

        $evidence = \core_competency\external::grade_competency($this->user->id, $c1->get('id'), 1, true);
        $evidence = \core_competency\external::grade_competency($this->user->id, $c1->get('id'), 2, true);

        $summary = external::data_for_user_competency_summary($this->user->id, $c1->get('id'));
        $this->assertTrue($summary->cangrade);
        $this->assertEquals('B', $summary->usercompetency->gradename);
        $this->assertEquals('B', $summary->evidence[0]->gradename);
        $this->assertEquals('A', $summary->evidence[1]->gradename);
    }

    public function test_data_for_course_competency_page() {
        $this->setAdminUser();

        $dg = $this->getDataGenerator();
        $lpg = $dg->get_plugin_generator('core_competency');
        $f1 = $lpg->create_framework();
        $c1 = $lpg->create_competency(array('competencyframeworkid' => $f1->get('id')));
        $course1 = $dg->create_course(array('category' => $this->category->id));
        $cc = api::add_competency_to_course($course1->id, $c1->get('id'));

        $evidence = \core_competency\external::grade_competency($this->user->id, $c1->get('id'), 1, true);
        $evidence = \core_competency\external::grade_competency($this->user->id, $c1->get('id'), 2, true);

        $pagegenerator = $this->getDataGenerator()->get_plugin_generator('mod_page');
        $page = $pagegenerator->create_instance(array('course' => $course1->id));
        $page2 = $pagegenerator->create_instance(array('course' => $course1->id));

        $cm = get_coursemodule_from_instance('page', $page->id);
        $cm2 = get_coursemodule_from_instance('page', $page2->id);
        // Add the competency to the course module.
        $ccm = api::add_competency_to_course_module($cm, $c1->get('id'));
        $summary = external::data_for_course_competencies_page($course1->id, 0);
        $summary2 = external::data_for_course_competencies_page($course1->id, $cm->id);
        $summary3 = external::data_for_course_competencies_page($course1->id, $cm2->id);

        $this->assertEquals(count($summary->competencies), 1);
        $this->assertEquals(count($summary->competencies), count($summary2->competencies));
        $this->assertEquals(count($summary3->competencies), 0);
    }
}