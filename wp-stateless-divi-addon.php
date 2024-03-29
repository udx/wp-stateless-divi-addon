<?php

/**
 * Plugin Name: WP-Stateless - Divi theme Addon
 * Plugin URI: https://stateless.udx.io/addons/divi/
 * Description: Provides compatibility between the Divi theme and the WP-Stateless plugin.
 * Author: UDX
 * Version: 0.0.1
 * Text Domain: wpsdivi
 * Author URI: https://udx.io
 * License: MIT
 * 
 * Copyright 2023 UDX (email: info@udx.io)
 */

namespace WPSL\Divi;

add_action('plugins_loaded', function () {
  if (class_exists('wpCloud\StatelessMedia\Compatibility')) {
    require_once 'vendor/autoload.php';
    // Load 
    return new Divi();
  }

  add_filter('plugin_row_meta', function ($plugin_meta, $plugin_file, $_, $__) {
    if ($plugin_file !== join(DIRECTORY_SEPARATOR, [basename(__DIR__), basename(__FILE__)])) return $plugin_meta;
    $plugin_meta[] = sprintf('<span style="color:red;">%s</span>', __('This plugin requires WP-Stateless plugin version 4.0.0 or greater to be installed and active.'));
    return $plugin_meta;
  }, 10, 4);
});
