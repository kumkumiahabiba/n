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
 * @outhor      Kumkumia Habiba
 * @license
 */


//moodleform is defined in formslib.php
require_once("$CFG->libdir/formslib.php");
class delete extends moodleform
{
    //add elements to form
    public function definition()
    {
        global $CFG,$DB;
        $choices =$DB->get_records('local_nursery');
        $plant_names =array();
        $c=0;
        foreach ($choices as $choice){
            $plant_names[$c]= $choice->plant_name;
            $plant_id[$c]= $choice->id;
            $c++;
        }//end for
        $mform=$this->_form; //underscore is important

        $mform->addElement('select','plant_names',get_string('deleteplant','local_nursery'),$plant_names);
        $mform->setDefault('plant_names',0);
        $this->add_action_buttons();

    }//end definition
    //customer valivation shouls be added here
    function validation($data, $files)
    {
        return array();
    }
}//end class
