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

global $DB;
$id = optional_param('id',0,PARAM_INT);
$PAGE->set_url(new moodle_url('/local/nursery/delete.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('delete', 'local_nursery'));


 try {

    $DB->delete_records('local_nursery', array('id' => $id));

    redirect($CFG->wwwroot . '/local/nursery/manage.php',  get_string('delete_plant','local_nursery'));
 } catch (Exception $exception)
 {
    throw new moodle_exception($exception);
 }

