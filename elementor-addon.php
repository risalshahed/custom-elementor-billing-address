<?php
/**
 * Plugin Name: Elementor Addon
 * Description: Customer Billing City widgets for Elementor.
 * Version:     1.0.0
 * Author:      Risal Shahed
 * Author URI:  https://www.linkedin.com/in/risal-shahed
 * Text Domain: elementor-addon
 */

function customer_billing_city_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/customer-billing-city.php' );

	$widgets_manager->register( new \Elementor_Billing_Address() );

}
add_action( 'elementor/widgets/register', 'customer_billing_city_widget' );