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

$PAGE->set_url(new moodle_url('/local/nursery/manage.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('manage nursery');

echo $OUTPUT->header();

$templatecontext=(object)[
    'texttodisplay'=>'here is something'
];
echo $OUTPUT->render_from_template('local_nursery/manage',$templatecontext);

echo $OUTPUT->footer();