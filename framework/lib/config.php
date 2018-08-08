<?php
/*============================================================================*/
/* Plugin Configuration
/*============================================================================*/
/* Loads the plugin config file and checks it against GitHub Repo data
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
/* Configure Plugin
/*
/* Loads the config data for this plugin
/*
/* @since       1.0.0
/* @version     1.0.0
/*============================================================================*/
/* @action      direwolf/load
/*============================================================================*/
function configure() {
    global $config;
    
    $configFile = plugin_dir( '/config.json' );
    $configData = file_get_contents( $configFile );
    
    $config = json_decode( $configData );
    
    do_action( 'direwolf/config/loaded' );
} add_action( 'direwolf/load', _call( 'configure' ), 5 );



function check_for_updates() {
    global $config;
    
    $repoConfigFile = $config->repo->config;
    
    if( file_exists( $repoConfigFile ) )
        $data = json_decode( file_get_contents( $repoConfigFile ) );
    
    var_dump( $data, $config );
    
    wp_die();
} add_action( 'direwolf/config/loaded', _call( 'check_for_updates' ) );