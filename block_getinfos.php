<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Block getinfos is defined here.
 *
 * @package     block_getinfos
 * @copyright   2023 INGDEV <damien.will@ingdev.fr>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_getinfos extends block_base
{
    /**
     * Initializes class member variables.
     */
    public function init()
    {
        // Needed by Moodle to differentiate between blocks.
        $this->title = get_string(identifier: 'pluginname', component: 'block_getinfos');
    }

    /**
     * Returns the block contents.
     *
     * @return stdClass The block contents.
     */


    // Ici une fonction pour déclarer si le plugin a un fichier de configuration (settings.php). Ici oui.
    function has_config()
    {
        return true;
    }


    // La fonction qui retourne le contenu du plugin de bloc.
    function get_content()
    {
        global $DB; // Moodle l'a initialisée auparavant. Elle permet le dialogue entre le fichier et la BDD.

        // On initialise une varibale "content".
        $content = '';

        // On récupère la valeur du paramètre "showcourses" dans le fichier de settings.php (configuration).
        $showcourses = get_config(plugin: 'block_getinfos', name: 'showcourses');
        // Si la valeur est "true", (donc la case est cochée), on affiche les cours dans le bloc.
        if ($showcourses) {
            $courses = $DB->get_records(table: 'course'); // Je fetche les données de la table "course".
            foreach ($courses as $course) {
                $content .= '<option value="' . $course->id . '">' . $course->shortname . ' ' . $course->fullname . '</option>';
            }
        }
        // Sinon on affiche les users dans le bloc.
        else {
            $users = $DB->get_records(table: 'user'); // Je fetche les données de la table "user".
            foreach ($users as $user) {
                $content .= '<option value="' . $user->id . '">' . $user->firstname . ' ' . $user->lastname . '</option>';
            }
        }

        if (empty($this->instance)) {
            $this->content = 'Pas de données disponibles';
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->text = $content;
        $this->content->footer = 'This is the footer';

        return $this->content; // On retourne notre objet "content".
    }

    /**
     * Defines configuration data.
     *
     * The function is called immediately after init().
     */
    public function specialization()
    {

        // Load user defined title and make sure it's never empty.
        if (empty($this->config->title)) {
            $this->title = get_string('pluginname', 'block_getinfos');
        } else {
            $this->title = $this->config->title;
        }
    }

    /**
     * Sets the applicable formats for the block.
     *
     * @return string[] Array of pages and permissions.
     */
    public function applicable_formats()
    {
        return array(
            'all' => true,
        );
    }
}