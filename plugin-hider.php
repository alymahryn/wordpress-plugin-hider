<?php
/*
Plugin Name: Plugin Hider
Description: Hides specified plugins from the WordPress plugins list
Version: 1.1
Author: Ali Mahryn
*/

function hide_plugins($plugins) {
    // List of plugins to hide (use the plugin's folder name and/or main file name)
    $hidden_plugins = array(
        'your-plugin-folder' => 'your-plugin.php',
        
        // Add more plugins here if needed, following the 'folder' => 'main-file.php' pattern
    );

    foreach ($hidden_plugins as $folder => $main_file) {
        $plugin_path = $folder . '/' . $main_file;
        if (isset($plugins[$plugin_path])) {
            unset($plugins[$plugin_path]);
        }
    }

    return $plugins;
}
add_filter('all_plugins', 'hide_plugins');

// Debug function to print active plugins
function debug_plugin_hider() {
    if (current_user_can('manage_options') && isset($_GET['debug_plugin_hider'])) {
        echo '<div class="notice notice-info is-dismissible">';
        echo '<p><strong>Plugin Hider Debug Information:</strong></p>';
        echo '<p>Active Plugins:</p>';
        echo '<pre>';
        print_r(get_option('active_plugins'));
        echo '</pre>';
        echo '<p>All Plugins:</p>';
        echo '<pre>';
        print_r(get_plugins());
        echo '</pre>';
        echo '</div>';
    }
}
add_action('admin_notices', 'debug_plugin_hider');
