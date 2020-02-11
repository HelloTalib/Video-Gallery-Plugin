<?php
/**
 * Plugin Name: Video Gallery
 * Plugin URI : https://flexthemes.netlify.com
 * Description: Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati est commodi inventore. Quod, omnis corrupti.
 * Version: 1.0.0
 * Author: talib
 * Author URI: https://talib.netlify.com
 * License: GPLv2
 * Domain Path: /languages/
 * Text Domain: video-gallery
 */

if (!defined('ABSPATH')) {
    exit;
}

define('PUBLIC_DIR', plugin_dir_url(__FILE__) . 'assets/public');
define('ADMIN_DIR', plugin_dir_url(__FILE__) . 'assets/admin');

require_once plugin_dir_path(__FILE__) . '/includes/video-gallery-scripts.php';
require_once plugin_dir_path(__FILE__) . '/includes/video-gallery-shortcode.php';

if(is_admin(  )){
    require_once plugin_dir_path(__FILE__) . '/includes/video-gallery-cpt.php';
    require_once plugin_dir_path(__FILE__) . '/includes/video-gallery-metabox.php';
    require_once plugin_dir_path(__FILE__) . '/includes/video-gallery-settings.php';

}