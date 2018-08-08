<?php
/*============================================================================*/
/* Direwolf Plugin Framework
/*============================================================================*/
/* Custom Plugin Framework by Direwolf Design
/*============================================================================*/
/* @since       1.0.0
/* @version     1.0.0
/*============================================================================*/
/* @package     Direwolf
/* @subpackage  Plugin
/* @author      Direwolf Design <nate@direwolfdesign.co>
/* @copyright   2018 Direwolf Design
/* @license     GPL-2.0+
/*============================================================================*/
/* @wordpress-plugin
/* Plugin Name: Direwolf
/* Plugin URI: https://direwolfdesign.co
/* Description: Direwolf Design Plugin Framework
/* Version: 1.0.0
/* Author: Direwolf Design <nate@direwolfdesign.co>
/* Author URI: https://direwolfdesign.co
/* Text Domain: direwolf
/* License: GPL-2.0+
/* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
/*============================================================================*/

/*============================================================================*/
/* Plugin Namespace: Direwolf
/*============================================================================*/
/* NOTE: Functions within namespaced files in this plugin will be inaccessible
/* globally without prepending the Plugin Namespace before calling them.
/*============================================================================*/
namespace Direwolf;



/*============================================================================*/
/* Plugin Globals
/*============================================================================*/
global $config;



/*============================================================================*/
/* Plugin Definitions
/*============================================================================*/
define( __NAMESPACE__ . '\\__PLUGIN__', 'direwolf' );
define( __NAMESPACE__ . '\\__PLUGIN_DIR__', dirname( __FILE__ ) );
define( __NAMESPACE__ . '\\__PLUGIN_URL__', plugins_url( __PLUGIN__ ) );



/*============================================================================*/
/* Debug Mode
/*============================================================================*/
/* Set to true to enable system logging of all actions run throughout page load
/*============================================================================*/
define( __NAMESPACE__ . '\\__DEBUG__', false );



/*============================================================================*/
/* Framework Loader
/*============================================================================*/
require_once( __PLUGIN_DIR__ . '/framework/lib/utilities.php' );
require_once( __PLUGIN_DIR__ . '/framework/lib/config.php' );
require_once( __PLUGIN_DIR__ . '/framework/lib/loader.php' );



/*============================================================================*/
/* Plugin Activation Hook
/*============================================================================*/
function activate_plugin() {
    require_once( __PLUGIN_DIR__ . '/framework/lib/activate.php' );
    do_action( 'direwolf/activate' );
} register_activation_hook( __FILE__, _call( 'activate_plugin' ) );



/*============================================================================*/
/* Plugin Deactivation Hook
/*============================================================================*/
function deactivate_plugin() {
    require_once( __PLUGIN_DIR__ . '/framework/lib/deactivate.php' );
    do_action( 'direwolf/deactivate' );
} register_deactivation_hook( __FILE__, _call( 'deactivate_plugin' ) );



/*============================================================================*/
/* Plugin Loader
/*============================================================================*/
function load_plugin() {
    do_action( 'direwolf/before-load' );
    
    do_action( 'direwolf/load' );    
    
    do_action( 'direwolf/loaded' );
} add_action( 'plugins_loaded', _call( 'load_plugin' ) );
