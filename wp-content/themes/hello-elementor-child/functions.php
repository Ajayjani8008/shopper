<?php

function hello_elementor_child_enqueue_styles()
{
    wp_enqueue_style('hello-elementor-theme-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('hello-elementor-child-style', get_stylesheet_directory_uri() . '/style.css', array('hello-elementor-theme-style'));
}
add_action('wp_enqueue_scripts', 'hello_elementor_child_enqueue_styles');



if (class_exists('WooCommerce')) {
    // Hook into 'woocommerce_init' to set up our custom features
    add_action('woocommerce_init', 'setup_multi_vendor_features');

    /**
     * Set up multi-vendor features like taxonomies, cron jobs, and database tables.
     */

    function setup_multi_vendor_features()
    {
        register_vendor_taxonomy();

        schedule_vendor_sales_report_cron();

        create_vendor_payout_table();
    }

    /**
     * Register a custom taxonomy for vendor categories.
     */
    function register_vendor_taxonomy()
    {
        register_taxonomy(
            'vendor_category',
            'product',
            array(
                'label'        => __('Vendor Categories', 'my-marketplace'),
                'rewrite'      => array('slug' => 'vendor-category'),
                'hierarchical' => true, // Set to true for hierarchical taxonomy
                'show_ui'      => true,
                'show_admin_column' => true,
            )
        );
    }


    /**
     * Schedule a cron job for sending weekly sales reports to vendors.
     */

    function schedule_vendor_sales_report_cron()
    {
        if (!wp_next_scheduled('send_vendor_sales_reports')) {
            wp_schedule_event(time(), 'weekly', 'send_vendor_sales_reports');
        }
    }


    // Hook the cron job to the function
    add_action('send_vendor_sales_reports', 'generate_vendor_sales_reports');


    function generate_vendor_sales_reports()
    {
        $vendors = get_terms('vendor_category', array('hide_empty' => false));

        foreach ($vendors as $vendor) {
            // Get the sales data for this vendor'
            $sales_data = get_vendor_sales_data($vendor->term_id);


            // Send the sales report to the vendor via email
            wp_mail(
                'parthbhatt9737@gmail.com', // Vendor email (replace with real email)
                'Weekly Sales Report',
                'Your sales report: ' . print_r($sales_data, true)
            );
        }
    }


    /**
     * Fetch sales data for a specific vendor.
     *
     * @param int $vendor_id The vendor term ID.
     * @return array An array containing sales data (total sales, number of orders, etc.).
     */



    function get_vendor_sales_data($vendor_id)
    {
        // Define the arguments for fetching WooCommerce orders
        $args = array(
            'status' => array('completed', 'proccessing'),  // Only include completed or processing orders
            'limit'  => -1, // No limit to the number of orders
        );


        // Fetch the Orders 

        $orders = wc_get_order($args);

        // Initialize sales data
        $sales_data = array(
            'total_sales' => 0,
            'order_count' => 0,
        );

        // Loop through the orders


        foreach ($orders as $order) {
            // Loop through each Order Item 
            foreach ($order->get_items() as $item) {
                $product_id = $item->get_product_id();
                // Check if the product belongs to the given vendor
                if (has_term($vendor_id, 'vendor_category', $product_id)) {
                    // Add to the total sales and order count for this vendor

                    $sales_data['total_sales'] += $item->get_total();
                    $sales_data['order_count']++;
                }
            }
        }
        return $sales_data;
    }

    /**
     * Create a custom database table for vendor payouts.
     */

    function create_vendor_payout_table()
    {
        global $wpdb;


        $table_name = $wpdb->prefix . 'vendor_payouts';
        $charset_collate = $wpdb->get_charset_collect();


        // SQL query to  create table 


        $sql = "CREATE TABLE IF NOT EXISTS $table_name(
        
        id bigint(20) not null AUTO_INCREMENT,
        vendor_id bigint(20)  not null ,
        amount  decimal(10,2) not null,
        status varchar(20) not null,
        created_at  datetime DEFAULT CURRENT_TIMESTAMP not null,
        PRIMARY KEY  (id)
        )$charset_collate;";


        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}
