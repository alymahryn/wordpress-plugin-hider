<?php
/*
Plugin Name: Plugin Hider
Description: Hides specified plugins from the WordPress plugins list
Version: 1.0
Author: Ali Mahryn
*/

function hide_plugins($plugins) {
    // List of plugins to hide (use the plugin's folder name)
    $hidden_plugins = array(
        'plugin-hider', // Hides this plugin
        'Your-plugin-name',
        // Add more plugin folder names here if needed
    );

    foreach ($hidden_plugins as $plugin) {
        $plugin_path = $plugin . '/' . $plugin . '.php';
        if (isset($plugins[$plugin_path])) {
            unset($plugins[$plugin_path]);
        }
    }

    return $plugins;
}
add_filter('all_plugins', 'hide_plugins');
