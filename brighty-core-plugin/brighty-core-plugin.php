<?php
/*
Plugin Name: Brighty Core Plugin
Description: The Alternative for the Sane Host
Version: 1.0
Author: IQL Technologies
*/


namespace BrightyCorePlugin;

define('BRIGHTY_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));


interface Brighty_Core_Plugin_Feature_Interface {
    public function init();
}

// Define the autoloader function
spl_autoload_register(function ($class) {
    $baseNamespace = 'BrightyCorePlugin';
    $baseDir = __DIR__ . '/includes/';

    // Remove the base namespace from the class name
    $classWithoutNamespace = str_replace($baseNamespace . '\\', '', $class);

    // Convert namespace separators to directory separators
    $classPath = str_replace('\\', '/', $classWithoutNamespace);

    // Define the full path to the class file
    $filePath = $baseDir . $classPath . '.php';

    // Load the class file if it exists
    if (file_exists($filePath)) {
        require_once $filePath;
    }
});


// Include composer autoload
require_once(plugin_dir_path(__FILE__) . 'vendor/autoload.php');

// Include the main plugin class
require_once(plugin_dir_path(__FILE__) . 'includes/class-brighty-core-plugin.php');

// Instantiate the main plugin class
$brighty_core_plugin = new BrightyCorePlugin();