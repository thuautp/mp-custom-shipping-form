<?php
/*
Plugin Name: MP Custom Shipping Form
Plugin URI: http://www.smashingadvantage.com
Description: MarketPress Custom Shipping Form Plugin allows you to insert (up to 10) custom fields into the shipping form of your MarketPress sites. This plugin aims to take the pain out of customize your MarketPress shipping form manually and making it very simple for you to customize your shipping form with no technical knowledge needed.
Author: Nathan Onn - MarketPressThemes.com
Author URI: http://www.smashingadvantage.com
Version: 1.1.5
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Copyright 2012 - 2013 Smashing Advantage Enterprise.

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License (Version 2 - GPLv2) as published by
the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

	if(!defined('MPCSF_PATH')) define( 'MPCSF_PATH', plugin_dir_path( __FILE__ ));
	if(!defined('MPCSF_DIR')) define( 'MPCSF_DIR', plugin_dir_url( __FILE__ ));

	if ( class_exists( 'MarketPress' ) ) {


		if( !class_exists('MPCSF') ) {

			class MPCSF {

			    private $plugin_path;
			    private $plugin_url;
			    private $l10n;
			    private $mpcsfcustom;

			    function __construct() 
			    {	
			        $this->plugin_path = MPCSF_PATH;
			        $this->plugin_url = MPCSF_DIR;
			        $this->l10n = 'mpcsf';
			        add_action( 'admin_menu', array(&$this, 'admin_menu'), 99 );
			        
			        // Include and create a new WordPressSettingsFramework
			        require_once( $this->plugin_path .'settings.php' );
			        require_once( $this->plugin_path .'inc/mpcsf-profile-settings.php' );
					require_once( $this->plugin_path .'inc/mpcsf-functions.php' );

			        $this->mpcsfcustom = new MPCSFCustomField( $this->plugin_path .'inc/mpcsf-custom.php' );
			        // Add an optional settings validation filter (recommended)
			        add_filter( $this->mpcsfcustom->get_option_group() .'_settings_validate', array(&$this, 'validate_settings') );

			        //enqueue front end css
			        add_action('wp_enqueue_scripts', array(&$this, 'mpcsf_register_front_end_css'));

					// Edit profile
					add_action( 'profile_update', 'mpcsf_user_profile_custom_field_update' , 10);
					add_action( 'edit_user_profile', 'mpcsf_user_profile_custom_fields' , 10);
					add_action( 'show_user_profile', 'mpcsf_user_profile_custom_fields' , 10);

					// shopping form
					add_filter( 'mp_checkout_shipping_field', 'mpcsf_show_custom_fields' , 10 );
					add_filter( 'mp_checkout_shipping_field_readonly', 'mpcsf_show_custom_fields_readonly' , 10 );
					add_action( 'mp_shipping_process', 'mpcsf_process_shipping_form' );

					// Order Page
				  	add_action( 'mp_order_status_output' , 'mpcsf_customfield_order_status_output' );
				  	add_action( 'mp_new_order' , 'mpcsf_customfield_add_data_to_new_order');
				  	add_action( 'mp_single_order_display_shipping' , 'mpcsf_customfield_display_in_single_order');

				  	// Order notification email
				  	add_action( 'mp_new_order' , 'mpcsf_customfield_add_filter_order_notification');
				  	add_filter( 'mp_shipped_order_notification' , 'mpcsf_customfield_filter_email_order_notification' , 10 , 2);
				  	add_filter( 'mp_order_notification_admin_msg' , 'mpcsf_customfield_filter_email_order_notification_admin' , 10 , 2);

				  	//updater
				  	add_action( 'init', array(&$this, 'mpcsf_plugin_updater_init') );

			    }
			    
			    function admin_menu()
			    {
			        add_submenu_page( 'edit.php?post_type=product', __( 'MarketPress Custom Shipping Form', $this->l10n ), __( 'Custom Shipping Form', $this->l10n ), 'update_core', 'mpcsf_custom', array(&$this, 'custom_page') );
			    }

			    function custom_page()
				{
				    // custom field page
				    ?>
					<div class="wrap">
						<div id="icon-options-general" class="icon32"></div>
						<h2>MarketPress Custom Shipping Form</h2>
						<?php 
						// Output your settings form
						$this->mpcsfcustom->settings(); 
						?>
					</div>
					<?php
					
				}
				
				function validate_settings( $input )
				{
			    	return $input;
				}

				function mpcsf_register_front_end_css() 
				{
					wp_enqueue_style('mpcsf-front-end-css', $this->plugin_url . 'css/mpcsf-frontend-css.css', null, null);
				}

				function mpcsf_plugin_updater_init() {

					include_once( $this->plugin_path .'inc/mpcsf-updater.php' );

					define( 'WP_GITHUB_FORCE_UPDATE', true );

					if ( is_admin() ) {

						$config = array(
							'slug' => plugin_basename( __FILE__ ),
							'proper_folder_name' => 'mp-custom-shipping-form',
							'api_url' => 'https://api.github.com/repos/nathanonn/mp-custom-shipping-form',
							'raw_url' => 'https://raw.github.com/nathanonn/mp-custom-shipping-form/master',
							'github_url' => 'https://github.com/nathanonn/mp-custom-shipping-form',
							'zip_url' => 'https://github.com/nathanonn/mp-custom-shipping-form/zipball/master',
							'sslverify' => true,
							'requires' => '3.3',
							'tested' => '3.5',
							'readme' => 'README.md',
							'access_token' => '',
						);

						new WP_GitHub_Updater( $config );

					}

				}

			}

			new MPCSF();

		}

	}

?>