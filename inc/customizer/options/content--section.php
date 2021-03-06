<?php
/**
 * Customizer settings: Content & Sidebar > Content Section
 *
 * @package Suki
 **/

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

$section = 'suki_section_content';

/**
 * ====================================================
 * Layout
 * ====================================================
 */

// Layout
$key = 'content_container';
$wp_customize->add_setting( $key, array(
	'default'     => suki_array_value( $defaults, $key ),
	'sanitize_callback' => array( 'Suki_Customizer_Sanitization', 'select' ),
) );
$wp_customize->add_control( $key, array(
	'type'        => 'select',
	'section'     => $section,
	'label'       => esc_html__( 'Layout', 'suki' ),
	'choices'     => array(
		'default'    => esc_html__( 'Full width section, wrapped content', 'suki' ),
		'full-width' => esc_html__( 'Full width content', 'suki' ),
	),
	'priority'    => 10,
) );

// Content & sidebar layout
$key = 'content_layout';
$wp_customize->add_setting( $key, array(
	'default'     => suki_array_value( $defaults, $key ),
	'sanitize_callback' => array( 'Suki_Customizer_Sanitization', 'select' ),
) );
$wp_customize->add_control( $key, array(
	'type'        => 'select',
	'section'     => $section,
	'label'       => esc_html__( 'Content & sidebar layout', 'suki' ),
	'choices'     => array(
		'wide'          => esc_html__( 'Full content, no sidebar', 'suki' ),
		'narrow'        => esc_html__( 'Narrow content, no sidebar', 'suki' ),
		'left-sidebar'  => is_rtl() ? esc_html__( 'Right sidebar', 'suki' ) : esc_html__( 'Left sidebar', 'suki' ),
		'right-sidebar' => is_rtl() ? esc_html__( 'Left sidebar', 'suki' ) : esc_html__( 'Right sidebar', 'suki' ),
	),
	'priority'    => 10,
) );

// Notice overridable via page settings
$wp_customize->add_control( new Suki_Customize_Control_Blank( $wp_customize, 'notice_override_content_layout', array(
	'section'     => $section,
	'settings'    => array(),
	'description' => sprintf(
		/* translators: %s: link to "Page Settings" section. */
		esc_html__( 'Settings above are global default, optionally you can set different layout for each page type via %s.', 'suki' ),
		'<a href="' . esc_attr( add_query_arg( 'autofocus[panel]', 'suki_panel_page_settings', remove_query_arg( 'autofocus' ) ) ) . '" class="suki-customize-goto-control">' . esc_html__( 'Page Settings', 'suki' ) . '</a>'
	),
	'priority'    => 10,
) ) );

// ------
$wp_customize->add_control( new Suki_Customize_Control_HR( $wp_customize, 'hr_content_layout', array(
	'section'     => $section,
	'settings'    => array(),
	'priority'    => 10,
) ) );

// Padding
$key = 'content_padding';
$settings = array(
	$key,
	$key . '__tablet',
	$key . '__mobile',
);
foreach ( $settings as $setting ) {
	$wp_customize->add_setting( $setting, array(
		'default'     => suki_array_value( $defaults, $setting ),
		'transport'   => 'postMessage',
		'sanitize_callback' => array( 'Suki_Customizer_Sanitization', 'dimensions' ),
	) );
}
$wp_customize->add_control( new Suki_Customize_Control_Dimensions( $wp_customize, $key, array(
	'settings'    => $settings,
	'section'     => $section,
	'label'       => esc_html__( 'Padding', 'suki' ),
	'units'       => array(
		'px' => array(
			'min'  => 0,
			'step' => 1,
		),
		'em' => array(
			'min'  => 0,
			'step' => 0.05,
		),
		'%' => array(
			'min'  => 0,
			'step' => 0.01,
		),
	),
	'priority'    => 10,
) ) );