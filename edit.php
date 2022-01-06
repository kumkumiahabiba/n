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
 * MOODLE VERSION INFORMATION
 *
 * This file defines the current version of the core Moodle code being used.
 * This is compared against the values stored in the database to determine
 * whether upgrades should be performed (see lib/db/*.php)
 *
 * @package    local_plugin
 * @outhor     Kumkumia Habiba
 * @license
 */

require_once(__DIR__.'/../../config.php');
require_once($CFG->dirroot.'/local/nursery/classes/form/edit.php');

global $DB;
$id=optional_param('id',0,PARAM_INT);
$PAGE->set_url(new moodle_url('/local/nursery/edit.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('edit page');

//to be passed in the constructor of edit form
$actionurl=new moodle_url('/local/nursery/edit.php');
if($id){
    $plant=$DB->get_record('local_nursery',array('id'=>$id));
    $mform= new edit($actionurl,$plant);
}
else {
    $mform= new edit($actionurl);
}



if ($mform->is_cancelled()) {
    //Handle form cancel operation, if cancel button is present on form
    redirect($CFG->wwwroot . '/local/nursery/manage.php', get_string('cancelled','local_nursery'));
} else if ($fromform = $mform->get_data()) {
    //In this case you process validated data. $mform->get_data() returns data posted in form.
    $record = new stdClass();
    $record->plant_name = $fromform->plant_name;
    $record->quantity = $fromform->quantity;
    $record->unit_price = $fromform->unit_price;

    if($fromform->id){
        $record->id= $fromform->id;
        $DB->update_record('local_nursery',$record);
        //go to manage page.
        redirect($CFG->wwwroot . '/local/nursery/manage.php', get_string('updated','local_nursery'));

    }
    else{
        $DB->insert_record('local_nursery', $record);
        //go to manage page
        redirect($CFG->wwwroot . '/local/nursery/manage.php',get_string('edit_data','local_nursery'));

    }
    }

echo $OUTPUT->header();
//echo $OUTPUT->heading();
$mform->display();
echo $OUTPUT->footer();