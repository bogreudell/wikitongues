<?php
// Set the save path for ACF JSON files.
add_filter('acf/settings/save_json', function ($path) {
    // Save JSON files to a folder in your theme.
    return get_stylesheet_directory() . '/acf-json';
});

// Set the load path for ACF JSON files.
add_filter('acf/settings/load_json', function ($paths) {
    // Append the JSON folder in your theme to the load paths.
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});