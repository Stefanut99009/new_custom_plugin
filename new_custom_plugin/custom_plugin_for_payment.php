<?php
/**
 * Plugin Name: Custom plugin for payment
 * Author Name: Pazzargic Stefanut
 * Description: This plugin allows for local content payment systems.
 * Version: 0.1.0
 * License: 0.1.0
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: custom_plugin
 */
if (!function_exists('is_plugin_active')) {
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
}
if (!is_plugin_active('woocommerce/woocommerce.php')) {
    deactivate_plugins(plugin_basename(__FILE__));
    wp_die(__('This plugin requires WooCommerce to be installed and active.', 'cutom_plugin'), __('Plugin Activation Error', 'custom_plugin'), array('back_link' => true));
}

?>