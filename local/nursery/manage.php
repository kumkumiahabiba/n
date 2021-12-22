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

require_once(__DIR__.'/../../config.php');
global $DB;
$PAGE->set_url(new moodle_url('/local/nursery/manage.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('manage nursery');

$plant_data=$DB->get_records('local_nursery');

echo $OUTPUT->header();

$templatecontext=(object)[
    'plant_data'=>array_values($plant_data),
    'editurl'=>new moodle_url('/local/nursery/update.php'),
    'addurl' => new moodle_url('/local/nursery/edit.php'),
    'deleteurl' => new moodle_url('/local/nursery/delete.php')
];
echo $OUTPUT->render_from_template('local_nursery/manage',$templatecontext);

echo $OUTPUT->footer();