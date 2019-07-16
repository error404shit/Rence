<?php

/*Theme Logo*/

function theme_logo($wp_customize){

	$wp_customize->add_setting( 'logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo',
	array(

		'label'		=> 'Upload Logo',
		'section'	=> 'title_tagline',
		'settings'	=> 'logo' 

	 ) ) );

    // Logo, title and description chooser
    $wp_customize->add_setting(
        'site_title_option',
        array (
            'default'           => 'text-only',
            'sanitize_callback' => 'theme_slug_sanitize_radio',
            'transport'         => 'refresh'
        )
    );
    $wp_customize->add_control(
        'site_title_option',
        array(
            'label'         => __( 'Display site title / logo.' ),
            'section'       => 'title_tagline',
            'type'          => 'radio',
            'description'   => __( 'Choose your preferred option.' ),
            'choices'   => array (
                'text-only'     => __( 'Display site title and description only.' ),
                'logo-only'     => __( 'Display site logo image only.' )
            )
        )
    );
}

add_action( 'customize_register', 'theme_logo' );



function rence_customizer_setting( $wp_customize ){

	// $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	// $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	// $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	// $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

	// $wp_customize->get_setting('color')->panel = 'Colors';

	/*Featured Image*/
	$wp_customize->add_section( 'tierfour_customizer', array( 

		'title'					=> __('Customizer Controls'),
		'priority'				=> 85

	 ) );

	$wp_customize->add_setting( 'thumbnail_display', array( 

		'default'				=> 0,
		'transport'				=> 'refresh',
		'type'					=> 'theme_mod',
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'		=> 'sanitize_checkbox'

	 ) );

	$wp_customize->add_control( 'thumbnail_display', array( 

		'label'		=> __( 'Hide Featured Image' ),
		'section'	=> 'tierfour_customizer',
		'type'		=> 'checkbox',
		'priority'	=> 5

	 ) );

	/*Related Posts*/
	$wp_customize->add_setting( 'related_display', array( 

		'default'				=> 0,
		'transport'				=> 'refresh',
		'type'					=> 'theme_mod',
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'		=> 'sanitize_checkbox'

	 ) );

	$wp_customize->add_control( 'related_display', array( 

		'label'		=> __( 'Hide Related Posts' ),
		'section'	=> 'tierfour_customizer',
		'type'		=> 'checkbox',
		'priority'	=> 5

	 ) );

	/*Page Widget Option*/
	$wp_customize->add_setting( 'page_option', array( 

		'default'				=> 0,
		'transport'				=> 'refresh',
		'type'					=> 'theme_mod',
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'		=> 'sanitize_checkbox'

	 ) );

	$wp_customize->add_control( 'page_option', array( 

		'label'		=> __( 'Show Widgets on Pages' ),
		'section'	=> 'tierfour_customizer',
		'type'		=> 'checkbox',
		'priority'	=> 5

	 ) );

	/*Author Box Option*/
	$wp_customize->add_setting( 'authorbox_option', array( 

		'default'				=> 0,
		'transport'				=> 'refresh',
		'type'					=> 'theme_mod',
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'		=> 'sanitize_checkbox'

	 ) );

	$wp_customize->add_control( 'authorbox_option', array( 

		'label'		=> __( 'Hide Author Box' ),
		'section'	=> 'tierfour_customizer',
		'type'		=> 'checkbox',
		'priority'	=> 5

	 ) );

	/*Social Media*/
	$wp_customize->add_section( 'tierfour_social_media', array( 

		'title'		=> __( 'Social Media' ),
		'priority'	=> 100,

	 ) );

	// Display Icons
	$wp_customize->add_setting( 'display_social_icons', array( 

		'default'			=> 0,
		'transport'			=> 'refresh',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_checkbox'

	 ) );

	$wp_customize->add_control( 'display_social_icons', array( 

		'label'		=> __( 'Display Icons' ),
		'section'	=> 'tierfour_social_media',
		'type'		=> 'checkbox',
		'priority'	=> 5

	 ) );

	// Facebook
	$wp_customize->add_setting( 'facebook', array( 

		'default'			=> '',
		'transport'			=> 'refresh',
		'type'				=> 'theme_mod',
		'capabilty'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'esc_url_raw'

	 ) );

	$wp_customize->add_control( 'facebook', array( 

		'label'		=> __( 'Facebook' ),
		'section'	=> 'tierfour_social_media',
		'type'		=> 'url',
		'priority'	=> 5,
		'input_attrs'	=> array(

			'placeholder'	=> 'Enter Link...'
		 
		 )

	 ) );

	// Twitter
	$wp_customize->add_setting( 'twitter', array( 

		'default'			=> '',
		'transport'			=> 'refresh',
		'type'				=> 'theme_mod',
		'capabilty'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'esc_url_raw'

	 ) );

	$wp_customize->add_control( 'twitter', array( 

		'label'		=> __( 'Twitter' ),
		'section'	=> 'tierfour_social_media',
		'type'		=> 'url',
		'priority'	=> 5,
		'input_attrs'	=> array(

			'placeholder'	=> 'Enter Link...'
		 
		 )

	 ) );

	// Instagram
	$wp_customize->add_setting( 'instagram', array( 

		'default'			=> '',
		'transport'			=> 'refresh',
		'type'				=> 'theme_mod',
		'capabilty'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'esc_url_raw'

	 ) );

	$wp_customize->add_control( 'instagram', array( 

		'label'		=> __( 'Instagram' ),
		'section'	=> 'tierfour_social_media',
		'type'		=> 'url',
		'priority'	=> 5,
		'input_attrs'	=> array(

			'placeholder'	=> 'Enter Link...'
		 
		 )

	 ) );

	// LinkedIn
	$wp_customize->add_setting( 'linkedin', array( 

		'default'			=> '',
		'transport'			=> 'refresh',
		'type'				=> 'theme_mod',
		'capabilty'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'esc_url_raw'

	 ) );

	$wp_customize->add_control( 'linkedin', array( 

		'label'		=> __( 'LinkedIn' ),
		'section'	=> 'tierfour_social_media',
		'type'		=> 'url',
		'priority'	=> 5,
		'input_attrs'	=> array(

			'placeholder'	=> 'Enter Link...'
		 
		 )

	 ) );

	// Youtube
	$wp_customize->add_setting( 'youtube', array( 

		'default'			=> '',
		'transport'			=> 'refresh',
		'type'				=> 'theme_mod',
		'capabilty'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'esc_url_raw'

	 ) );

	$wp_customize->add_control( 'youtube', array( 

		'label'		=> __( 'YouTube' ),
		'section'	=> 'tierfour_social_media',
		'type'		=> 'url',
		'priority'	=> 5,
		'input_attrs'	=> array(

			'placeholder'	=> 'Enter Link...'
		 
		 )

	 ) );

	// Google+
	$wp_customize->add_setting( 'google+', array( 

		'default'			=> '',
		'transport'			=> 'refresh',
		'type'				=> 'theme_mod',
		'capabilty'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'esc_url_raw'

	 ) );

	$wp_customize->add_control( 'google+', array( 

		'label'		=> __( 'Google+' ),
		'section'	=> 'tierfour_social_media',
		'type'		=> 'url',
		'priority'	=> 5,
		'input_attrs'	=> array(

			'placeholder'	=> 'Enter Link...'
		 
		 )

	 ) );

	// Customize Categories
	$wp_customize->add_panel(
		'custom_theme_appearance',
		array(
			'priority'	=> 80,
			'capability' 	=> 'edit_theme_options',
			'theme_support'	=> '',
			'title'			=> __( 'Customize Theme Appearance', 'TierFour' ),
			'description'	=> __( 'Custom your theme appearance', 'TierFour' )
		)
	);

	// Category selection
	$categories = get_categories();

	$cats = array();
	$i = 0;

	foreach( $categories as $category ) {

	// uncomment to see all $category data
	#print_r($category);

	if( $i == 0 ){

	    $default = $category->term_id;
	    $i++;

	}
	$cats[$category->term_id] = $category->name;
	}

	/*Category Posts*/
	$wp_customize->add_section( 'category_posts_customizer', array( 

		'title'		=> __( 'Category Post Styles' ),
		'priority'	=> 85,
		'panel'		=> 'custom_theme_appearance'

	 ) );

	$wp_customize->add_control( 'category_posts_option', array( 

		'label'		=> __( 'Category Posts Styles' ),
		'section'	=> 'category_posts_customizer',
		'priority'	=> 5,
		'type'		=> 'radio',
		'choices'	=> array( 
			'main'			=> __( 'Style 1' ),
			'secondary'		=> __( 'Style 2' )
		 )

	 ) );

	$wp_customize->add_setting( 'category_post_selection', array( 

		'default'			=> '1',
		'transport'			=> 'refresh',
		'sanitize_callback' => 'theme_slug_sanitize_select',

	 ) );

	$wp_customize->add_control( 'category_post_selection', array( 

		'label'			=> __( 'Category Selection' ),
		'description'	=> esc_html__( 'Choose category you want to output' ),
		'section'		=> 'category_posts_customizer',
		'priority'		=> 6,
		'type'			=> 'select',
		'capability'	=> 'edit_theme_options',
		'choices'		=> 	$cats

	 ) );

	/*Category A Posts*/
	$wp_customize->add_section( 'category_a_posts_customizer', array( 

		'title'		=> __( 'Category A Post Styles' ),
		'priority'	=> 85,
		'panel'		=> 'custom_theme_appearance'

	 ) );

	$wp_customize->add_control( 'category_a_posts_option', array( 

		'label'		=> __( 'Category A Posts Styles' ),
		'section'	=> 'category_a_posts_customizer',
		'priority'	=> 5,
		'type'		=> 'radio',
		'choices'	=> array( 
			'main'			=> __( 'Style 1' ),
			'secondary'		=> __( 'Style 2' )
		 )

	 ) );

	$wp_customize->add_setting( 'category_a_post_selection', array( 

		'default'			=> '1',
		'transport'			=> 'refresh',
		'sanitize_callback' => 'theme_slug_sanitize_select',

	 ) );

	$wp_customize->add_control( 'category_a_post_selection', array( 

		'label'			=> __( 'Category A Selection' ),
		'description'	=> esc_html__( 'Choose category you want to output' ),
		'section'		=> 'category_a_posts_customizer',
		'priority'		=> 6,
		'type'			=> 'select',
		'capability'	=> 'edit_theme_options',
		'choices'		=> 	$cats

	 ) );

	/*Category B Posts*/
	$wp_customize->add_section( 'category_b_posts_customizer', array( 

		'title'		=> __( 'Category B Post Styles' ),
		'priority'	=> 85,
		'panel'		=> 'custom_theme_appearance'

	 ) );

	$wp_customize->add_control( 'category_b_posts_option', array( 

		'label'		=> __( 'Category B Posts Styles' ),
		'section'	=> 'category_b_posts_customizer',
		'priority'	=> 5,
		'type'		=> 'radio',
		'choices'	=> array( 
			'main'			=> __( 'Style 1' ),
			'secondary'		=> __( 'Style 2' )
		 )

	 ) );

	$wp_customize->add_setting( 'category_b_post_selection', array( 

		'default'			=> '1',
		'transport'			=> 'refresh',
		'sanitize_callback' => 'theme_slug_sanitize_select',

	 ) );

	$wp_customize->add_control( 'category_b_post_selection', array( 

		'label'			=> __( 'Category B Selection' ),
		'description'	=> esc_html__( 'Choose category you want to output' ),
		'section'		=> 'category_b_posts_customizer',
		'priority'		=> 6,
		'type'			=> 'select',
		'capability'	=> 'edit_theme_options',
		'choices'		=> 	$cats

	 ) );

}

add_action('customize_register', 'rence_customizer_setting');

function sanitize_checkbox( $input ){

	return ( ( isset( $input ) && true == $input ) ? true : false );
}

//select sanitization function
function theme_slug_sanitize_select( $input, $setting ){
 
    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible select options 
    $choices = $setting->manager->get_control( $setting->id )->choices;
                     
    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
     
}

//radio box sanitization function
function theme_slug_sanitize_radio( $input, $setting ){
 
    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible radio box options 
    $choices = $setting->manager->get_control( $setting->id )->choices;
                     
    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
     
}