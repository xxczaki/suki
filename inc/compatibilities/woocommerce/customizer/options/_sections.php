<?php
/**
 * Customizer sections: WooComerce
 *
 * @package Suki
 **/

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

// Panel
$panel = 'woocommerce';
$wp_customize->get_panel( $panel )->priority = 182;

// Store Notice
$wp_customize->get_section( 'woocommerce_store_notice' )->priority = 1;

// ------
$wp_customize->add_section( new Suki_Customize_Section_Spacer( $wp_customize, 'suki_section_spacer_woocommerce_pages', array(
	'panel'       => $panel,
	'priority'    => 9,
) ) );

// Products Catalog
$wp_customize->get_section( 'woocommerce_product_catalog' )->title = esc_html__( 'Shop (Products Catalog) Page', 'suki' );

// Single Product
$wp_customize->add_section( 'woocommerce_product_single', array(
	'title'       => esc_html__( 'Single Product Page', 'suki' ),
	'panel'       => $panel,
	'priority'    => 11, // Place it under the 'Shop (Products Catalog) Page' section
) );

// Cart
$wp_customize->add_section( 'woocommerce_cart', array(
	'title'       => esc_html__( 'Cart Page', 'suki' ),
	'panel'       => $panel,
	'priority'    => 12, // Place it under the 'Shop (Products Catalog) Page' section
) );

// Checkout
$wp_customize->get_section( 'woocommerce_checkout' )->title = esc_html__( 'Checkout Page', 'suki' );
$wp_customize->get_section( 'woocommerce_checkout' )->priority = 13;

// ------
$wp_customize->add_section( new Suki_Customize_Section_Spacer( $wp_customize, 'suki_section_spacer_woocommerce_grid', array(
	'panel'       => $panel,
	'priority'    => 60,
) ) );

// Products Grid
$wp_customize->add_section( 'woocommerce_products_grid', array(
	'title'       => esc_html__( 'Products Grid', 'suki' ),
	'description' => esc_html__( 'Global styles for products grid as used in main product catalog page, related products, up-sells, cross-sells, and products shortcodes.', 'suki' ),
	'panel'       => $panel,
	'priority'    => 61,
) );

// ------
$wp_customize->add_section( new Suki_Customize_Section_Spacer( $wp_customize, 'suki_section_spacer_woocommerce_others', array(
	'panel'       => $panel,
	'priority'    => 70,
) ) );

// Product Images
$wp_customize->get_section( 'woocommerce_product_images' )->priority = 71;

// Other Elements
$wp_customize->add_section( 'suki_section_woocommerce_elements', array(
	'title'       => esc_html__( 'Other Elements', 'suki' ),
	'panel'       => $panel,
	'priority'    => 72,
) );

if ( suki_show_pro_teaser() ) {
	// ------
	$wp_customize->add_section( new Suki_Customize_Section_Spacer( $wp_customize, 'suki_section_spacer_woocommerce_advanced', array(
		'panel'       => $panel,
		'priority'    => 90,
	) ) );

	// More Options Available on Suki Pro
	$wp_customize->add_section( new Suki_Customize_Section_Pro_Teaser( $wp_customize, 'suki_section_pro_woocommerce_advanced', array(
		'title'       => esc_html_x( 'More Options on Suki Pro', 'Suki Pro upsell', 'suki' ),
		'panel'       => $panel,
		'url'         => SUKI_PRO_URL,
		'features'    => array(
			esc_html_x( 'Product alternate hover image', 'Suki Pro upsell', 'suki' ),
			esc_html_x( 'Product quick view', 'Suki Pro upsell', 'suki' ),
			esc_html_x( 'Off-canvas filters', 'Suki Pro upsell', 'suki' ),
		),
		'priority'    => 90,
	) ) );
}