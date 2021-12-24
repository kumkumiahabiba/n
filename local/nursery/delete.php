<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'local_nursery', language 'en', branch 'MOODLE_20_STABLE'
 *
 * @package    local_plugin
 * @outhor      Kumkumia Habiba
 * @license
 */


require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot . '/local/nursery/classes/form/delete.php');

$PAGE->set_url(new moodle_url('/local/nursery/delete.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('title_delete', 'local_nursery'));


$plant_id = array();
$plant_names = array();
$choices = $DB->get_records('local_nursery');
$c = 0;
foreach ($choices as $choice) {
    $plant_names[$c] = $choice->plant_name;
    $plant_id[$c] = $choice->plant_id;
    $c++;
}
//Instantiate simplehtml_form
$mform = new delete();

//Form processing and displaying is done here
if ($mform->is_cancelled()) {
    //Handle form cancel operation, if cancel button is present on form
    redirect($CFG->wwwroot . '/local/nursery/manage.php', "Nothing is deleted");
} else if ($fromform = $mform->get_data()) {
    //In this case you process validated data. $mform->get_data() returns data posted in form.
    $plant_id = $plantid[$fromform->plant_name];
    $DB->delete_records('local_nursery', array('id' => $plant_id));

    redirect($CFG->wwwroot . '/local/nursery/manage.php', $plant_names[$fromform->plan_tname] . " is deleted");
}

echo $OUTPUT->header();

$mform->display();

echo $OUTPUT->footer();