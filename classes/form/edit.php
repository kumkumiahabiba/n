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

class edit extends moodleform {
    protected $data;
    /**
    * constructor.
     */
    public function __construct($actionurl = null, $data = null)
    {
        $this->data= $data;
        parent::__construct($actionurl);
    }

    /*Add elements to form*/
    public function definition() {
        global $CFG;

        $mform = $this->_form; // Don't forget the underscore!

        $mform->addElement('hidden', 'id', get_string('id','local_nursery')); // Add elements to your form
        $mform->setType('id', PARAM_NOTAGS);                   //Set type of element
        $mform->setDefault('id',$this->data->id??"");

        $mform->addElement('text', 'plant_name', get_string('name','local_nursery')); // Add elements to your form
        $mform->setType('plant_name', PARAM_NOTAGS);                   //Set type of element
        $mform->setDefault('plant_name', $this->data->plant_name??"");        //Default value

        $mform->addElement('float', 'unit_price', get_string('price','local_nursery')); // Add elements to your form
        $mform->setType('unit_price', PARAM_NOTAGS);                   //Set type of element
        $mform->setDefault('unit_price', $this->data->unit_price??"");        //Default value

        $mform->addElement('text', 'quantity', get_string('quantity','local_nursery')); // Add elements to your form
        $mform->setType('quantity', PARAM_NOTAGS);                   //Set type of element
        $mform->setDefault('quantity', $this->data->quantity??"");        //Default value
        $this->add_action_buttons();
    }
    //Custom validation should be added here
    function validation($data, $files) {
        return array();
    }
}