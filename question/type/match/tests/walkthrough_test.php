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
 * This file contains tests that walks a question through the interactive
 * behaviour.
 *
 * @package   qtype_match
 * @copyright 2010 The Open University
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('ESET_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/question/engine/tests/helpers.php');


/**
 * Unit tests for the matching question type.
 *
 * @copyright 2010 The Open University
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_match_walkthrough_test extends qbehaviour_walkthrough_test_base {

    public function test_deferred_feedback_unanswered() {

        // Create a matching question.
        $m = test_question_maker::make_question('match');
        $m->shufflestems = false;
        $this->start_attempt_at_question($m, 'deferredfeedback', 4);

        $choiceorder = $m->get_choice_order();
        $orderforchoice = array_combine(array_values($choiceorder), array_keys($choiceorder));
        $choices = array(0 => get_string('choose') . '...');
        foreach ($choiceorder as $key => $choice) {
            $choices[$key] = $m->choices[$choice];
        }

        // Check the initial state.
        $this->check_current_state(question_state::$todo);
        $this->check_current_mark(null);
        $this->check_current_output(
                $this->get_contains_question_text_expectation($m),
                $this->get_does_not_contain_feedback_expectation());
        $this->check_output_contains_selectoptions(
                $this->get_contains_select_expectation('sub0', $choices, null, true),
                $this->get_contains_select_expectation('sub1', $choices, null, true),
                $this->get_contains_select_expectation('sub2', $choices, null, true),
                $this->get_contains_select_expectation('sub3', $choices, null, true));
        $this->check_step_count(1);

        // Save a blank response.
        $this->process_submission(array('sub0' => '0', 'sub1' => '0',
                'sub2' => '0', 'sub3' => '0'));

        // Verify.
        $this->check_current_state(question_state::$todo);
        $this->check_current_mark(null);
        $this->check_current_output(
                $this->get_contains_question_text_expectation($m),
                $this->get_does_not_contain_feedback_expectation());
        $this->check_output_contains_selectoptions(
                $this->get_contains_select_expectation('sub0', $choices, null, true),
                $this->get_contains_select_expectation('sub1', $choices, null, true),
                $this->get_contains_select_expectation('sub2', $choices, null, true),
                $this->get_contains_select_expectation('sub3', $choices, null, true));
        $this->check_step_count(1);

        // Finish the attempt.
        $this->quba->finish_all_questions();

        // Verify.
        $this->check_current_state(question_state::$gaveup);
        $this->check_current_mark(null);
        $this->check_output_contains_selectoptions(
                $this->get_contains_select_expectation('sub0', $choices, null, false),
                $this->get_contains_select_expectation('sub1', $choices, null, false),
                $this->get_contains_select_expectation('sub2', $choices, null, false),
                $this->get_contains_select_expectation('sub3', $choices, null, false));
    }

    public function test_deferred_feedback_partial_answer() {

        // Create a matching question.
        $m = test_question_maker::make_question('match');
        $m->shufflestems = false;
        $this->start_attempt_at_question($m, 'deferredfeedback', 4);

        $choiceorder = $m->get_choice_order();
        $orderforchoice = array_combine(array_values($choiceorder), array_keys($choiceorder));
        $choices = array(0 => get_string('choose') . '...');
        foreach ($choiceorder as $key => $choice) {
            $choices[$key] = $m->choices[$choice];
        }

        // Check the initial state.
        $this->check_current_state(question_state::$todo);
        $this->check_current_mark(null);
        $this->check_current_output(
                $this->get_contains_question_text_expectation($m),
                $this->get_does_not_contain_feedback_expectation());
        $this->check_output_contains_selectoptions(
                $this->get_contains_select_expectation('sub0', $choices, null, true),
                $this->get_contains_select_expectation('sub1', $choices, null, true),
                $this->get_contains_select_expectation('sub2', $choices, null, true),
                $this->get_contains_select_expectation('sub3', $choices, null, true));

        // Save a partial response.
        $this->process_submission(array('sub0' => $orderforchoice[1],
                'sub1' => $orderforchoice[2], 'sub2' => '0', 'sub3' => '0'));

        // Verify.
        $this->check_current_state(question_state::$invalid);
        $this->check_current_mark(null);
        $this->check_current_output(
                $this->get_contains_question_text_expectation($m),
                $this->get_does_not_contain_feedback_expectation());
        $this->check_output_contains_selectoptions(
                $this->get_contains_select_expectation('sub0', $choices, $orderforchoice[1], true),
                $this->get_contains_select_expectation('sub1', $choices, $orderforchoice[2], true),
                $this->get_contains_select_expectation('sub2', $choices, null, true),
                $this->get_contains_select_expectation('sub3', $choices, null, true));

        // Finish the attempt.
        $this->quba->finish_all_questions();

        // Verify.
        $this->check_current_state(question_state::$gradedpartial);
        $this->check_current_mark(2);
        $this->check_current_output(
                $this->get_contains_partcorrect_expectation());
        $this->check_output_contains_selectoptions(
                $this->get_contains_select_expectation('sub0', $choices, $orderforchoice[1], false),
                $this->get_contains_select_expectation('sub1', $choices, $orderforchoice[2], false),
                $this->get_contains_select_expectation('sub2', $choices, null, false),
                $this->get_contains_select_expectation('sub3', $choices, null, false));
    }

    public function test_interactive_correct_no_submit() {

        // Create a matching question.
        $m = test_question_maker::make_question('match');
        $m->hints = array(
            new question_hint_with_parts(11, 'This is the first hint.', FORMAT_HTML, false, false),
            new question_hint_with_parts(12, 'This is the second hint.', FORMAT_HTML, true, true),
        );
        $m->shufflestems = false;
        $this->start_attempt_at_question($m, 'interactive', 4);

        $choiceorder = $m->get_choice_order();
        $orderforchoice = array_combine(array_values($choiceorder), array_keys($choiceorder));
        $choices = array(0 => get_string('choose') . '...');
        foreach ($choiceorder as $key => $choice) {
            $choices[$key] = $m->choices[$choice];
        }

        // Check the initial state.
        $this->check_current_state(question_state::$todo);
        $this->check_current_mark(null);
        $this->check_current_output(
                $this->get_contains_submit_button_expectation(true),
                $this->get_does_not_contain_feedback_expectation(),
                $this->get_tries_remaining_expectation(3),
                $this->get_no_hint_visible_expectation());
        $this->check_output_contains_selectoptions(
                $this->get_contains_select_expectation('sub0', $choices, null, true),
                $this->get_contains_select_expectation('sub1', $choices, null, true),
                $this->get_contains_select_expectation('sub2', $choices, null, true),
                $this->get_contains_select_expectation('sub3', $choices, null, true));

        // Save the right answer.
        $this->process_submission(array('sub0' => $orderforchoice[1],
                'sub1' => $orderforchoice[2], 'sub2' => $orderforchoice[2],
                'sub3' => $orderforchoice[1]));

        // Finish the attempt without clicking check.
        $this->quba->finish_all_questions();

        // Verify.
        $this->check_current_state(question_state::$gradedright);
        $this->check_current_mark(4);
        $this->check_current_output(
                $this->get_does_not_contain_submit_button_expectation(),
                $this->get_contains_correct_expectation(),
                $this->get_no_hint_visible_expectation());
        $this->check_output_contains_selectoptions(
                $this->get_contains_select_expectation('sub0', $choices, $orderforchoice[1], false),
                $this->get_contains_select_expectation('sub1', $choices, $orderforchoice[2], false),
                $this->get_contains_select_expectation('sub2', $choices, $orderforchoice[2], false),
                $this->get_contains_select_expectation('sub3', $choices, $orderforchoice[1], false));
    }

    public function test_interactive_partial_no_submit() {

        // Create a matching question.
        $m = test_question_maker::make_question('match');
        $m->hints = array(
            new question_hint_with_parts(11, 'This is the first hint.', FORMAT_HTML, false, false),
            new question_hint_with_parts(12, 'This is the second hint.', FORMAT_HTML, true, true),
        );
        $m->shufflestems = false;
        $this->start_attempt_at_question($m, 'interactive', 4);

        $choiceorder = $m->get_choice_order();
        $orderforchoice = array_combine(array_values($choiceorder), array_keys($choiceorder));
        $choices = array(0 => get_string('choose') . '...');
        foreach ($choiceorder as $key => $choice) {
            $choices[$key] = $m->choices[$choice];
        }

        // Check the initial state.
        $this->check_current_state(question_state::$todo);
        $this->check_current_mark(null);
        $this->check_current_output(
                $this->get_contains_submit_button_expectation(true),
                $this->get_does_not_contain_feedback_expectation(),
                $this->get_tries_remaining_expectation(3),
                $this->get_no_hint_visible_expectation());
        $this->check_output_contains_selectoptions(
                $this->get_contains_select_expectation('sub0', $choices, null, true),
                $this->get_contains_select_expectation('sub1', $choices, null, true),
                $this->get_contains_select_expectation('sub2', $choices, null, true),
                $this->get_contains_select_expectation('sub3', $choices, null, true));

        // Save the right answer.
        $this->process_submission(array('sub0' => $orderforchoice[1],
                'sub1' => $orderforchoice[2], 'sub2' => $orderforchoice[1],
                'sub3' => '0'));

        // Finish the attempt without clicking check.
        $this->quba->finish_all_questions();

        // Verify.
        $this->check_current_state(question_state::$gradedpartial);
        $this->check_current_mark(2);
        $this->check_current_output(
                $this->get_does_not_contain_submit_button_expectation(),
                $this->get_contains_partcorrect_expectation(),
                $this->get_no_hint_visible_expectation());
        $this->check_output_contains_selectoptions(
                $this->get_contains_select_expectation('sub0', $choices, $orderforchoice[1], false),
                $this->get_contains_select_expectation('sub1', $choices, $orderforchoice[2], false),
                $this->get_contains_select_expectation('sub2', $choices, $orderforchoice[1], false),
                $this->get_contains_select_expectation('sub3', $choices, null, false));
    }

    public function test_interactive_with_invalid() {

        // Create a matching question.
        $m = test_question_maker::make_question('match');
        $m->hints = array(
            new question_hint_with_parts(11, 'This is the first hint.', FORMAT_HTML, false, false),
            new question_hint_with_parts(12, 'This is the second hint.', FORMAT_HTML, true, true),
        );
        $m->shufflestems = false;
        $this->start_attempt_at_question($m, 'interactive', 4);

        $choiceorder = $m->get_choice_order();
        $orderforchoice = array_combine(array_values($choiceorder), array_keys($choiceorder));
        $choices = array(0 => get_string('choose') . '...');
        foreach ($choiceorder as $key => $choice) {
            $choices[$key] = $m->choices[$choice];
        }

        // Check the initial state.
        $this->check_current_state(question_state::$todo);
        $this->check_current_mark(null);
        $this->check_current_output(
                $this->get_contains_submit_button_expectation(true),
                $this->get_does_not_contain_feedback_expectation(),
                $this->get_tries_remaining_expectation(3),
                $this->get_no_hint_visible_expectation());
        $this->check_output_contains_selectoptions(
                $this->get_contains_select_expectation('sub0', $choices, null, true),
                $this->get_contains_select_expectation('sub1', $choices, null, true),
                $this->get_contains_select_expectation('sub2', $choices, null, true),
                $this->get_contains_select_expectation('sub3', $choices, null, true));

        // Try to submit an invalid answer.
        $this->process_submission(array('sub0' => '0',
                'sub1' => '0', 'sub2' => '0',
                'sub3' => '0', '-submit' => '1'));

        // Verify.
        $this->check_current_state(question_state::$invalid);
        $this->check_current_mark(null);
        $this->check_current_output(
                $this->get_contains_submit_button_expectation(true),
                $this->get_does_not_contain_feedback_expectation(),
                $this->get_invalid_answer_expectation(),
                $this->get_no_hint_visible_expectation());
        $this->check_output_contains_selectoptions(
                $this->get_contains_select_expectation('sub0', $choices, null, true),
                $this->get_contains_select_expectation('sub1', $choices, null, true),
                $this->get_contains_select_expectation('sub2', $choices, null, true),
                $this->get_contains_select_expectation('sub3', $choices, null, true));

        // Now submit the right answer.
        $this->process_submission(array('sub0' => $orderforchoice[1],
                'sub1' => $orderforchoice[2], 'sub2' => $orderforchoice[2],
                'sub3' => $orderforchoice[1], '-submit' => '1'));

        // Verify.
        $this->check_current_state(question_state::$gradedright);
        $this->check_current_mark(4);
        $this->check_current_output(
                $this->get_does_not_contain_submit_button_expectation(),
                $this->get_contains_correct_expectation(),
                $this->get_no_hint_visible_expectation());
        $this->check_output_contains_selectoptions(
                $this->get_contains_select_expectation('sub0', $choices, $orderforchoice[1], false),
                $this->get_contains_select_expectation('sub1', $choices, $orderforchoice[2], false),
                $this->get_contains_select_expectation('sub2', $choices, $orderforchoice[2], false),
                $this->get_contains_select_expectation('sub3', $choices, $orderforchoice[1], false));
    }

    public function test_match_with_tricky_html_choices() {

        // Create a matching question.
        $m = test_question_maker::make_question('match');
        $m->stems = array(
            1 => '(1, 2]',
            2 => '[1, 2]',
            3 => '[1, 2)',
        );
        $m->choices = array(
            1 => '1 < x ≤ 2',
            2 => '1 ≤ x ≤ 2',
            3 => '1 ≤ x < 2',
        );
        $m->right = array(1 => 1, 2 => 2, 3 => 3);
        $m->shufflestems = false;
        $this->start_attempt_at_question($m, 'deferredfeedback', 3);

        $choiceorder = $m->get_choice_order();
        $orderforchoice = array_combine(array_values($choiceorder), array_keys($choiceorder));
        $choices = array(0 => get_string('choose') . '...');
        foreach ($choiceorder as $key => $choice) {
            $choices[$key] = $m->choices[$choice];
        }

        // Check the initial state.
        $this->check_current_state(question_state::$todo);
        $this->check_current_mark(null);
        // Do not use check_output_contains_selectoptions as there are multibyte characters ('1 ≤ x ≤ 2') that
        // seem to be read as ascii ('1 â¤ x â¤ 2') in this test.
        $this->check_current_output(
                $this->get_contains_select_expectation('sub0', $choices, null, true),
                $this->get_contains_select_expectation('sub1', $choices, null, true),
                $this->get_contains_select_expectation('sub2', $choices, null, true),
                $this->get_contains_question_text_expectation($m),
                $this->get_does_not_contain_feedback_expectation());
        $this->check_step_count(1);

        $rightresponse = array('sub0' => $orderforchoice[1],
                'sub1' => $orderforchoice[2], 'sub2' => $orderforchoice[3]);
        $rightresponsesummary =
                '(1, 2] -> 1 < x ≤ 2; [1, 2] -> 1 ≤ x ≤ 2; [1, 2) -> 1 ≤ x < 2';

        $this->process_submission($rightresponse);
        $this->finish();

        $this->assertEquals($rightresponsesummary, $m->summarise_response($rightresponse));

        $this->displayoptions->history = 1;
        $this->check_current_output(
                new question_pattern_expectation('/' .
                        preg_quote(htmlspecialchars($rightresponsesummary), '/') . '/'));
    }

    public function test_match_clear_wrong() {

        // Create a matching question.
        $m = test_question_maker::make_question('match');
        $m->hints = array(
            new question_hint_with_parts(11, 'This is the first hint.', FORMAT_HTML, false, true),
            new question_hint_with_parts(12, 'This is the second hint.', FORMAT_HTML, true, true),
        );
        $m->shufflestems = false;
        $this->start_attempt_at_question($m, 'interactive', 4);

        $choiceorder = $m->get_choice_order();
        $orderforchoice = array_combine(array_values($choiceorder), array_keys($choiceorder));
        $choices = array(0 => get_string('choose') . '...');
        foreach ($choiceorder as $key => $choice) {
            $choices[$key] = $m->choices[$choice];
        }

        // Check the initial state.
        $this->check_current_state(question_state::$todo);
        $this->check_current_mark(null);
        $this->check_current_output(
                $this->get_contains_submit_button_expectation(true),
                $this->get_does_not_contain_feedback_expectation(),
                $this->get_tries_remaining_expectation(3),
                $this->get_no_hint_visible_expectation());
        $this->check_output_contains_selectoptions(
                $this->get_contains_select_expectation('sub0', $choices, null, true),
                $this->get_contains_select_expectation('sub1', $choices, null, true),
                $this->get_contains_select_expectation('sub2', $choices, null, true),
                $this->get_contains_select_expectation('sub3', $choices, null, true));

        // Submit a completely wrong response.
        $this->process_submission(array('sub0' => $orderforchoice[3],
                'sub1' => $orderforchoice[3], 'sub2' => $orderforchoice[3],
                'sub3' => $orderforchoice[3], '-submit' => 1));

        // Verify.
        $this->check_current_state(question_state::$todo);
        $this->check_current_mark(null);
        $this->check_current_output(
                $this->get_contains_hidden_expectation(
                        $this->quba->get_field_prefix($this->slot) . 'sub0', '0'),
                $this->get_contains_hidden_expectation(
                        $this->quba->get_field_prefix($this->slot) . 'sub1', '0'),
                $this->get_contains_hidden_expectation(
                        $this->quba->get_field_prefix($this->slot) . 'sub2', '0'),
                $this->get_contains_hidden_expectation(
                        $this->quba->get_field_prefix($this->slot) . 'sub3', '0'),
                $this->get_does_not_contain_submit_button_expectation(),
                $this->get_contains_hint_expectation('This is the first hint.'));
        $this->check_output_contains_selectoptions(
                $this->get_contains_select_expectation('sub0', $choices, $orderforchoice[3], false),
                $this->get_contains_select_expectation('sub1', $choices, $orderforchoice[3], false),
                $this->get_contains_select_expectation('sub2', $choices, $orderforchoice[3], false),
                $this->get_contains_select_expectation('sub3', $choices, $orderforchoice[3], false));

        // Try again.
        $this->process_submission(array('sub0' => 0,
                'sub1' => 0, 'sub2' => 0,
                'sub3' => 0, '-tryagain' => 1));

        // Verify.
        $this->check_current_state(question_state::$todo);
        $this->check_current_mark(null);
        $this->check_current_output(
                $this->get_contains_submit_button_expectation(true),
                $this->get_does_not_contain_feedback_expectation(),
                $this->get_tries_remaining_expectation(2),
                $this->get_no_hint_visible_expectation());
        $this->check_output_contains_selectoptions(
                $this->get_contains_select_expectation('sub0', $choices, null, true),
                $this->get_contains_select_expectation('sub1', $choices, null, true),
                $this->get_contains_select_expectation('sub2', $choices, null, true),
                $this->get_contains_select_expectation('sub3', $choices, null, true));

        // Submit a partially wrong response.
        $this->process_submission(array('sub0' => $orderforchoice[3],
                'sub1' => $orderforchoice[3], 'sub2' => $orderforchoice[2],
                'sub3' => $orderforchoice[1], '-submit' => 1));

        // Verify.
        $this->check_current_state(question_state::$todo);
        $this->check_current_mark(null);
        $this->check_current_output(
                $this->get_contains_hidden_expectation(
                        $this->quba->get_field_prefix($this->slot) . 'sub0', '0'),
                $this->get_contains_hidden_expectation(
                        $this->quba->get_field_prefix($this->slot) . 'sub1', '0'),
                $this->get_contains_hidden_expectation(
                        $this->quba->get_field_prefix($this->slot) . 'sub2', $orderforchoice[2]),
                $this->get_contains_hidden_expectation(
                        $this->quba->get_field_prefix($this->slot) . 'sub3', $orderforchoice[1]),
                $this->get_does_not_contain_submit_button_expectation(),
                $this->get_contains_hint_expectation('This is the second hint.'));
        $this->check_output_contains_selectoptions(
                $this->get_contains_select_expectation('sub0', $choices, $orderforchoice[3], false),
                $this->get_contains_select_expectation('sub1', $choices, $orderforchoice[3], false),
                $this->get_contains_select_expectation('sub2', $choices, $orderforchoice[2], false),
                $this->get_contains_select_expectation('sub3', $choices, $orderforchoice[1], false));

        // Try again.
        $this->process_submission(array('sub0' => 0,
                'sub1' => 0, 'sub2' => $orderforchoice[2],
                'sub3' => $orderforchoice[1], '-tryagain' => 1));

        // Verify.
        $this->check_current_state(question_state::$todo);
        $this->check_current_mark(null);
        $this->check_current_output(
                $this->get_contains_submit_button_expectation(true),
                $this->get_does_not_contain_feedback_expectation(),
                $this->get_tries_remaining_expectation(1),
                $this->get_no_hint_visible_expectation());
        $this->check_output_contains_selectoptions(
                $this->get_contains_select_expectation('sub0', $choices, null, true),
                $this->get_contains_select_expectation('sub1', $choices, null, true),
                $this->get_contains_select_expectation('sub2', $choices, $orderforchoice[2], true),
                $this->get_contains_select_expectation('sub3', $choices, $orderforchoice[1], true));

    }
}
