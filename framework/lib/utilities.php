<?php
/*============================================================================*/
/* Plugin Utilities
/*============================================================================*/
/* Utility functions for this plugin
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
/* Namespace Prefix
/*
/* Returns the supplied string prefixed with the current plugin namespace
/*
/* @since       1.0.0
/* @version     1.0.0
/*============================================================================*/
/* @param       string      $string     The string to prefix
/*============================================================================*/
/* @return      string      $string     The prefixed string
/*============================================================================*/
if( ! function_exists( __NAMESPACE__ . '\\_ns' ) ) :
    function _ns( $string ) {
        if ( strpos( $string, __NAMESPACE__ ) == FALSE ) return __NAMESPACE__ . "\\" .  $string;
        return $string;
    }
endif;



/*============================================================================*/
/* Namespace Function Exists
/*
/* Returns whether the specified function exists within the current plugin
/* namespace
/*
/* @since       1.0.0
/* @version     1.0.0
/*============================================================================*/
/* @param       (string)    $fn         The function name to check
/*============================================================================*/
/* @return      (bool)      $exists     Whether the specified function exists
/*============================================================================*/
if( ! function_exists( __NAMESPACE__ . '\\_function_exists' ) ) :
    function _function_exists( $fn ) {
        return $exists = function_exists( _ns( $fn ) );
    }
endif;



/*============================================================================*/
/* Function Name Prefix
/*
/* Returns the supplied function name prefixed with the current plugin 
/* namespace
/*
/* @since       1.0.0
/* @version     1.0.0
/*============================================================================*/
/* @param       string      $fn         The function name to prefix
/*============================================================================*/
/* @return      string      $fn         The prefixed function name
/*============================================================================*/
if( ! _function_exists( '_call' ) ) :
    function _call( $fn ) {
        return _ns( $fn );
    }
endif;



/*============================================================================*/
/* Get Plugin Directory
/*
/* Returns the full file path to the directory for this plugin
/*
/* @since       1.0.0
/* @version     1.0.0
/*============================================================================*/
/* @param       string      $path       An optional path to append to the
/*                                      plugin directory path
/*============================================================================*/
/* @return      string      Returns the path to the plugin directory appended
/*                          with any optional path supplied.
/*============================================================================*/
if( ! _function_exists( 'plugin_dir' ) ) :
    function plugin_dir( $path = false ) {
        if( $path ) return __PLUGIN_DIR__ . $path;
        return __PLUGIN_DIR__;
    }
endif;



/*============================================================================*/
/* Get Plugin URL
/*
/* Returns the full URL path to the directory for this plugin
/*
/* @since       1.0.0
/* @version     1.0.0
/*============================================================================*/
/* @param       string      $path       An optional path to append to the
/*                                      plugin directory url
/*============================================================================*/
/* @return      string      Returns the url to the plugin directory appended
/*                          with any optional path supplied.
/*============================================================================*/
if( ! _function_exists( 'plugin_url' ) ) :
    function plugin_url( $path = false ) {
        if( $path ) return __PLUGIN_URL__ . $path;
        return __PLUGIN_URL__;
    }
endif;



/*============================================================================*/
/* Load Plugin Directory Files
/*
/* Recursively loads files from a plugin directory. Because everything in the 
/* plugin is controlled via WordPress hooks, the order that files are loaded 
/* in shouldn't matter. The exception to this rule is with Class dependency.
/* If classes need to be loaded in order, don't use this function to load them.
/* Instead, create a loader file with the correct class load order in place.
/*
/* @since       1.0.0
/* @version     1.0.0
/*============================================================================*/
if( ! _function_exists( 'load_dir' ) ) :
    function load_dir( $dir, $require = false, $recursive = true ) {    
        foreach( glob( $dir . '/*' ) as $file ) {
            if( $recursive && is_dir( $file ) ) { load_dir( $file, $require, $recursive ); } 
            else {
                if( $require && ! is_dir( $file ) ) require( $file );
                else if( ! is_dir( $file ) ) include( $file );
            }
        }
    }
endif;