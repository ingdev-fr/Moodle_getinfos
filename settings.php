<?php
// SI il existe un arbre des paramètres au niveau de Moodle
if ($ADMIN->fulltree) {
    // Ajoute dans l'arbre des settings les paramètres suivants grace à la fonction "admin_settings_configcheckbox" (une case à cocher avec les valeurs "true" ou "false") qui prend 4 arguments :
    $settings->add(new admin_setting_configcheckbox(name:'block_getinfos/showcourses', visiblename:get_string(identifier:'showcoursesvisiblename', component:'block_getinfos'), description:get_string(identifier:'showcoursesdescription', component:'block_getinfos'), defaultsetting:0));
}