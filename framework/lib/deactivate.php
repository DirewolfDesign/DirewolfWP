<?php
/*============================================================================*/
/* Plugin Deactivator
/*============================================================================*/
/* Handles deactivation of the plugin
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
/* Deactivate Plugin
/*
/* Called when the plugin is deactivated. Should be used to remove any options
/* or custom fields that are set and controlled by this plugin.
/*
/* @since       1.0.0
/* @version     1.0.0
/*============================================================================*/
/* @action      direwolf/load
/*============================================================================*/
function deactivate() {
    do_action( 'direwolf/before-deactivate' );
    
    do_action( 'direwolf/deactivated' );
} add_action( 'direwolf/deactivate', _call( 'deactivate' ) );