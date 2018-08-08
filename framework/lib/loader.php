<?php
/*============================================================================*/
/* Plugin Loader
/*============================================================================*/
/* Handles loading of plugin components and states
/*============================================================================*/
/* @since       1.0.0
/* @version     1.0.0
/*============================================================================*/
/* @package     Direwolf
/* @subpackage  Plugin/Framework
/* @author      Direwolf Design <nate@direwolfdesign.co>
/* @copyright   2018 Direwolf Design
/* @license     GPL-2.0+
/*============================================================================*/



/*============================================================================*/
/* Plugin Namespace: Direwolf
/*============================================================================*/
namespace Direwolf;



/*============================================================================*/
/* Load Plugin Framework Files
/*
/* Loads any required framework files within the plugin directory
/*
/* @since       1.0.0
/* @version     1.0.0
/*============================================================================*/
/* @action      direwolf/load
/*============================================================================*/
function load_framework() {    
    load_dir( plugin_dir( '/framework/classes' ), false, true );
//    load_dir( plugin_dir( '/framework/lib' ), false, true );
    
    if( file_exists( plugin_dir( '/framework/functions.php' ) ) )
	   require_once( plugin_dir( '/framework/functions.php' ) );
} add_action( 'direwolf/load', _call( 'load_framework' ), 10 );



/*============================================================================*/
/* Load Vendor Files
/*
/* Loads any vendor files within the plugin directory
/*
/* @since       1.0.0
/* @version     1.0.0
/*============================================================================*/
/* @action      direwolf/load
/*============================================================================*/
function load_vendor() {    
    load_dir( plugin_dir( '/vendor/stripe' ), false, false );
} add_action( 'direwolf/load', _call( 'load_vendor' ), 15 );



/*============================================================================*/
/* Load Plugin Admin Files
/*
/* Loads any required admin files within the plugin directory
/*
/* @since       1.0.0
/* @version     1.0.0
/*============================================================================*/
/* @action      direwolf/load
/*============================================================================*/
function load_admin() {        
    $dir = plugin_dir( '/admin/classes/' ); 
    foreach( glob( $dir . '*.php' ) as $file ) include( $file );
    
    $dir = plugin_dir( '/admin/lib/' );
    foreach( glob( $dir . '*/*.php' ) as $file ) include( $file );
    
    $dir = plugin_dir( '/admin/inc/' );
    foreach( glob( $dir . '*.php' ) as $file ) include( $file );
    
    if( file_exists( plugin_dir( '/admin/functions.php' ) ) )
	   require_once( plugin_dir( '/admin/functions.php' ) );
} add_action( 'direwolf/load', _call( 'load_admin' ), 20 );



/*============================================================================*/
/* Load Plugin Public Files
/*
/* Loads any required public files within the plugin directory
/*
/* @since       1.0.0
/* @version     1.0.0
/*============================================================================*/
/* @action      direwolf/load
/*============================================================================*/
function load_public() {
    if( ! is_admin() ) :
        $dir = plugin_dir( '/public/lib/' );
        foreach( glob( $dir . '*.php' ) as $file ) include( $file );

        if( file_exists( plugin_dir( '/public/functions.php' ) ) )
            require_once( plugin_dir( '/public/functions.php' ) );
    endif;
} add_action( 'direwolf/load', _call( 'load_public' ), 20 );