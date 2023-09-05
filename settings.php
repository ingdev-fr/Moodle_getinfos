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
 * Course list block settings
 *
 * @package     block_getinfos
 * @copyright   2023 INGDEV <damien.will@ingdev.fr>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;
// SI il existe un arbre des paramètres au niveau de Moodle.
if ($ADMIN->fulltree) {
    // Ajoute dans l'arbre des settings les paramètres suivants grace.
    // à la fonction "admin_settings_configcheckbox" (une case à cocher avec les valeurs "true" ou "false") qui prend 4 arguments.
    $settings->add(
        new admin_setting_configcheckbox(
            name: 'block_getinfos/showcourses',
            visiblename: get_string(
                identifier: 'showcoursesvisiblename',
                component: 'block_getinfos'
            ),
            description: get_string(
                identifier: 'showcoursesdescription',
                component: 'block_getinfos'
            ),
            defaultsetting: 0
        )
    );
}