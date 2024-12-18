<?php
/**
 * Checkout Payment Section
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 */

defined('ABSPATH') || exit;

// Action before the payment section is loaded
if (! wp_doing_ajax()) {
    do_action('woocommerce_review_order_before_payment');
}

// Custom action hook before payment methods block
do_action('bbloomer_before_woocommerce/checkout-payment-methods-block');
?>

<div id="payment" class="woocommerce-checkout-payment">
    <?php if (WC()->cart->needs_payment()) : ?>
        <ul class="wc_payment_methods payment_methods methods">
            <?php if (! empty($available_gateways)) : ?>
                <?php foreach ($available_gateways as $gateway) : ?>
                    <li class="wc_payment_method payment_method_<?php echo esc_attr($gateway->id); ?>">
                        <input id="payment_method_<?php echo esc_attr($gateway->id); ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr($gateway->id); ?>" <?php checked($gateway->chosen, true); ?> />
                        <label for="payment_method_<?php echo esc_attr($gateway->id); ?>">
                            <?php echo wp_kses_post($gateway->get_title()); ?>
                            <?php if ($gateway->get_icon()) : ?>
                                <?php echo wp_kses_post($gateway->get_icon()); ?>
                            <?php endif; ?>
                        </label>
                        <?php if ($gateway->has_fields() || $gateway->get_description()) : ?>
                            <div class="payment_box payment_method_<?php echo esc_attr($gateway->id); ?>" <?php if (! $gateway->chosen) echo 'style="display:none;"'; ?>>
                                <?php $gateway->payment_fields(); ?>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            <?php else : ?>
                <li>
                    <?php
                    // Display notice when no payment methods are available
                    wc_print_notice(
                        apply_filters(
                            'woocommerce_no_available_payment_methods_message',
                            WC()->customer->get_billing_country()
                                ? esc_html__('Sorry, it seems that there are no available payment methods. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce')
                                : esc_html__('Please fill in your details above to see available payment methods.', 'woocommerce')
                        ),
                        'notice'
                    );
                    ?>
                </li>
            <?php endif; ?>
        </ul>
    <?php endif; ?>

    <div class="form-row place-order">
        <noscript>
            <?php
            /* translators: $1 and $2 opening and closing emphasis tags respectively */
            printf(
                esc_html__('Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce'),
                '<em>',
                '</em>'
            );
            ?>
            <br />
            <button type="submit" class="button alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e('Update totals', 'woocommerce'); ?>"><?php esc_html_e('Update totals', 'woocommerce'); ?></button>
        </noscript>

        <?php wc_get_template('checkout/terms.php'); ?>

        <?php do_action('woocommerce_review_order_before_submit'); ?>

        <?php
        // Place order button
        echo apply_filters(
            'woocommerce_order_button_html',
            '<button type="submit" class="button alt' . esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : '') . '" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr($order_button_text) . '" data-value="' . esc_attr($order_button_text) . '">' . esc_html($order_button_text) . '</button>'
        );
        ?>

        <?php do_action('woocommerce_review_order_after_submit'); ?>

        <?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>
    </div>
</div>

<?php
// Action after the payment section is loaded
if (! wp_doing_ajax()) {
    do_action('woocommerce_review_order_after_payment');
}
