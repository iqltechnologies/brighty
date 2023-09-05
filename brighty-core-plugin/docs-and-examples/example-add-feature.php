<?php
/*
Plugin Name: A new feature for brighty
Description: example plugin that adds a new feature to brighty
Version: 1.0
Author: IQL Technologies
*/

namespace MyCustomPlugin;

use BrightyCorePlugin\Brighty_Core_Plugin_Feature_Interface;

class AdditionalFeature implements Brighty_Core_Plugin_Feature_Interface {
    private $plugin;

    public function __construct($plugin) {
        $this->plugin = $plugin;
    }

    public function init() {
        // Code for the additional feature
    }
}
