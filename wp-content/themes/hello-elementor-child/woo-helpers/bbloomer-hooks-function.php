<?php
// Add a custom payment option before the payment methods block
add_action('bbloomer_before_woocommerce/checkout-payment-methods-block', 'add_custom_payment_method_option');

function add_custom_payment_method_option()
{
    ?>
    <div class="custom-payment-method">
        <h3><?php esc_html_e('Custom Payment Method', 'woocommerce'); ?></h3>
        <p><?php esc_html_e('Use our special payment method for exclusive benefits!', 'woocommerce'); ?></p>
        <label>
            <input type="radio" name="payment_method" value="custom_payment">
            <?php esc_html_e('Custom Payment Option', 'woocommerce'); ?>
        </label>
    </div>
    <?php
}

// Ensure the custom payment method is processed when selected
add_action('woocommerce_checkout_process', 'validate_custom_payment_method_selection');
function validate_custom_payment_method_selection()
{
    if (isset($_POST['payment_method']) && $_POST['payment_method'] === 'custom_payment') {
        // Add validation logic if needed
    }
}

// Handle the order if custom payment is chosen
add_action('woocommerce_thankyou', 'process_custom_payment_method');
function process_custom_payment_method($order_id)
{
    $order = wc_get_order($order_id);

    if ($order->get_payment_method() === 'custom_payment') {
        // Add logic for custom payment handling here
        $order->add_order_note(__('Custom payment method selected.', 'woocommerce'));
    }
}
?>
