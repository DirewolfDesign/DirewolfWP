<?php
/*============================================================================*/
/* Plugin Activator
/*============================================================================*/
/* Handles activation of the plugin
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
/* Activate Plugin
/*
/* Called when the plugin is activated. Should be used to set any options
/* or custom fields that are required and controlled by this plugin.
/*
/* @since       1.0.0
/* @version     1.0.0
/*============================================================================*/
/* @action      direwolf/load
/*============================================================================*/
function activate() {
    do_action( 'direwolf/before-activate' );
    
    do_action( 'direwolf/activated' );
} add_action( 'direwolf/activate', _call( 'activate' ) );