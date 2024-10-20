<?php
/**
 * Plugin Name: Custom plugin for payment
 * Author Name: Pazargic Stefanut
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
    wp_die(__('This plugin requires WooCommerce to be installed and active.', 'custom_plugin'), __('Plugin Activation Error', 'custom_plugin'), array('back_link' => true));
}

// Use the correct function name here
add_filter('woocommerce_checkout_fields', 'checkout_extra_fields');

function checkout_extra_fields($fields)
{
    $fields['billing'] = array_merge(
        array(
            'vreau_oferta' => array(
                'label' => __('Vreau oferta livrare', 'custom_plugin'),
                'required' => false,
                'clear' => false,
                'type' => 'checkbox',
            ),
        ),
        $fields['billing']
    );

    return $fields;
}

add_action('wp_footer', 'custom_plugin_footer_script');
function custom_plugin_footer_script()
{
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const checkbox = document.querySelector('input[name="vreau_oferta"]');
    const savedCheckboxState = localStorage.getItem('vreau_oferta');
    if (savedCheckboxState === 'true') {
    checkbox.checked = true;
    }
    checkbox.addEventListener('change', function () {
    localStorage.setItem('vreau_oferta', checkbox.checked);
    jQuery('body').trigger('update_checkout'); // Trigger update of WooCommerce checkout
    });
    });
    </script><?php
}

add_action('woocommerce_cart_calculate_fees', 'woo_add_cart_ups_y_n_fee', 43, 1);
function woo_add_cart_ups_y_n_fee($cart)
{
    if (!$_POST || (is_admin() && !is_ajax())) {
        return;
    }

    if (isset($_POST['post_data'])) {
        parse_str($_POST['post_data'], $post_data);
    } else {
        $post_data = $_POST;
    }

    if (isset($post_data['vreau_oferta']) && $post_data['vreau_oferta'] == 1) {
        $extracost = 10 * WC()->cart->get_cart_contents_weight(); // Fee when the checkbox is checked
        WC()->cart->add_fee('Cost suplimentar ofertă', $extracost);
    }
}
?>

