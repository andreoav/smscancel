<?php
/*
Plugin Name: NitroSMS Cancelar SMS
Plugin URI: /
Description: Retira o número mobile inserido das listas de contatos da empresa
Version: 1.1
Author: Andreo Vieira
Author URI: /
Author Email: andreoav@gmail.com
Text Domain: nitrosms-plugin-locale
Domain Path: /lang/

Copyright 2012 Opa!Web (opa@opaweb.net)
*/

class NitroSMS extends WP_Widget {

	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/

	/**
	 * The widget constructor. Specifies the classname and description, instantiates
	 * the widget, loads localization files, and includes necessary scripts and
	 * styles.
	 */
	public function __construct() {

		load_plugin_textdomain( 'nitrosms-plugin-locale', false, plugin_dir_path( __FILE__ ) . '/lang/' );

		// Manage plugin ativation/deactivation hooks
		register_activation_hook( __FILE__, array( &$this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( &$this, 'deactivate' ) );

		parent::__construct('nitrosms-plugin-id', __( 'NitroSMS Cancel', 'nitrosms-plugin-locale' ), array(
				'classname'		=>	'nitrosms-plugin-class',
				'description'	=>	__( 'Retira o número mobile inserido das listas de contatos da empresa.', 'nitrosms-plugin-locale' )
			)
		);

		// Register site styles and scripts
		add_action( 'wp_enqueue_scripts', array( &$this, 'register_widget_styles' ) );
		add_action( 'wp_enqueue_scripts', array( &$this, 'register_widget_scripts' ) );

	} // end constructor

	/*--------------------------------------------------*/
	/* Widget API Functions
	/*--------------------------------------------------*/

	/**
	 * Outputs the content of the widget.
	 *
	 * @args			The array of form elements
	 * @instance		The current instance of the widget
	 */
	public function widget( $args, $instance ) {

		extract( $args, EXTR_SKIP );

		echo $before_widget;

    	// TODO: This is where you retrieve the widget values.
    	// Note that this 'Title' is just an example
    	$title  = apply_filters('widget_title', empty( $instance['title'] ) ? __( 'NitroSMS', 'nitrosms-plugin-locale' ) : $instance['title'], $instance, $this->id_base);
    	$apikey = $instance['apikey'];
    	$dir    = plugin_dir_url(__FILE__) . 'request.php';

		include( plugin_dir_path(__FILE__) . '/views/widget.php' );

		echo $after_widget;

	} // end widget

	/**
	 * Processes the widget's options to be saved.
	 *
	 * @new_instance	The previous instance of values before the update.
	 * @old_instance	The new instance of values to be generated via the update.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		// Atualiza a APIKEY do widget
		$instance['apikey'] = strip_tags( $new_instance['apikey'] );

		return $instance;

	} // end widget

	/**
	 * Generates the administration form for the widget.
	 *
	 * @instance	The array of keys and values for the widget.
	 */
	public function form( $instance ) {

    	// Valores default do form na parte adm
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title'  => 'NitroSMS',
				'apikey' => ''
			)
		);

		// TODO store the values of widget in a variable

		// Display the admin form
		include( plugin_dir_path(__FILE__) . '/views/admin.php' );

	} // end form

	/*--------------------------------------------------*/
	/* Public Functions
	/*--------------------------------------------------*/

	/**
	 * Fired when the plugin is activated.
	 *
	 * @params	$network_wide	True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog
	 */
	public function activate( $network_wide ) {
		// TODO define activation functionality here
	} // end activate

	/**
	 * Fired when the plugin is deactivated.
	 *
	 * @params	$network_wide	True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog
	 */
	public function deactivate( $network_wide ) {
		// TODO define deactivation functionality here
	} // end deactivate

	/**
	 * Registers and enqueues admin-specific styles.
	 */
	public function register_admin_styles() {

		// TODO change 'nitrosms-plugin' to the name of your plugin
		//wp_register_style( 'nitrosms-plugin-admin-styles', plugins_url( 'nitrosms-plugin/css/admin.css' ) );
		//wp_enqueue_style( 'nitrosms-plugin-admin-styles' );

	} // end register_admin_styles

	/**
	 * Registers and enqueues admin-specific JavaScript.
	 */
	public function register_admin_scripts() {

		// TODO change 'nitrosms-plugin' to the name of your plugin
		//wp_register_script( 'nitrosms-plugin-admin-script', plugins_url( 'nitrosms-plugin/js/admin.js' ) );
		//wp_enqueue_script( 'nitrosms-plugin-admin-script' );

	} // end register_admin_scripts

	/**
	 * Registers and enqueues widget-specific styles.
	 */
	public function register_widget_styles() {

		// TODO change 'nitrosms-plugin' to the name of your plugin
		//wp_register_style( 'nitrosms-plugin-widget-styles', plugins_url( 'nitrosms-plugin/css/admin.css' ) );
		//wp_enqueue_style( 'nitrosms-plugin-widget-styles' );

	} // end register_widget_styles

	/**
	 * Registers and enqueues widget-specific scripts.
	 */
	public function register_widget_scripts() {

		// TODO change 'nitrosms-plugin' to the name of your plugin
		wp_enqueue_script('jquery');
		wp_register_script( 'nitrosms-plugin-scripts', plugins_url( 'smscancel/js/widget.js' ) );
		wp_enqueue_script( 'nitrosms-plugin-scripts' );


	} // end register_widget_scripts

} // end class

// TODO remember to change 'NitroSMS' to match the class name definition
add_action( 'widgets_init', create_function( '', 'register_widget("NitroSMS");' ) );
?>
