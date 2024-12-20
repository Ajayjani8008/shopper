<?php

/**
 * Plugin Name: Custom Payment Gateway
 * Description: Adds a custom payment gateway to WooCommerce.
 * Author: Ajay Jani
 * Version: 1.0
 */

// Exit if accessed directly

if (! defined('ABSPATH')) {
    exit;
}

// Add the custom gateway to WooCommerce payment gateways
add_filter('woocommerce_payment_gateways', 'add_custom_gateway_class');
function add_custom_gateway_class($gateways)
{
    $gateways[] = 'WC_Gateway_Custom'; // Add the custom gateway class
    return $gateways;
}
// Initialize the custom payment gateway class
add_action('plugins_loaded', 'initialize_custom_gateway_class', 20);

function initialize_custom_gateway_class()
{
    if (!class_exists('WC_Payment_Gateway')) {
        return;
    }

    class WC_Gateway_Custom extends WC_Payment_Gateway
    {

        public function __construct()
        {
            $this->id = 'custom_payment';
            $this->method_title = __('Custom Payment', 'woocommerce');
            $this->method_description = __('Custom Payment Gateway for WooCommerce.', 'woocommerce');

            $this->init_form_fields();
            $this->init_settings();

            $this->has_fields = true;
            $this->title = $this->get_option('title');
            $this->description = $this->get_option('description');

            add_action('woocommerce_update_options_payment_gateways_' . $this->id, [$this, 'process_admin_options']);
        }

        public function init_form_fields()
        {
            $this->form_fields = [
                'enabled' => [
                    'title'   => __('Enable/Disable', 'woocommerce'),
                    'type'    => 'checkbox',
                    'label'   => __('Enable Custom Payment', 'woocommerce'),
                    'default' => 'yes',
                ],
                'title' => [
                    'title'       => __('Title', 'woocommerce'),
                    'type'        => 'text',
                    'description' => __('This controls the title which the user sees during checkout.', 'woocommerce'),
                    'default'     => __('Custom Payment', 'woocommerce'),
                    'desc_tip'    => true,
                ],
                'description' => [
                    'title'       => __('Description', 'woocommerce'),
                    'type'        => 'textarea',
                    'description' => __('This controls the description displayed during checkout.', 'woocommerce'),
                    'default'     => __('Pay with our custom payment gateway.', 'woocommerce'),
                ],
            ];
        }

        public function process_payment($order_id)
        {
            $order = wc_get_order($order_id);


            $order->update_status('on-hold', __('Awaiting Custom Payment', 'woocommerce'));


            wc_reduce_stock_levels($order_id);


            WC()->cart->empty_cart();


            return [
                'result'   => 'success',
                'redirect' => $this->get_return_url($order),
            ];
        }
    }
}
