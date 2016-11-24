<?php
/* 
 * Plugin Name: Hubsine Framework
 * Plugin URI: http://hubsineframework.com
 * Description: Plugin de développement pour wordpress
 * Version: 0.1
 * Author: Hubsine
 * Author URI: https://hubsine.com   
 * Licence: GPL2
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
    die;
}

//include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
//if (!is_plugin_active('hubsine-framework/hubsine-framework.php')) {
//    throw new Exception('Sorry. You must activate Hubsine Framework to use it.');
//}

###
# Required files
###

require_once __DIR__ . '/defines.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/DependencyInjection/Container.php';

###
# Used
###

use Composer\Autoload\ClassLoader;

###
# Class Loader By Composer
###

global $hfClassLoader;

if(is_null($hfClassLoader)){
    
    $hfClassLoader = new ClassLoader();
 
    $classMap = array(
        'HubsineFrameworkPlugin'    => __DIR__ . '/HubsineFrameworkPlugin.php'
    );

    $hfClassLoader->addClassMap($classMap);
    $hfClassLoader->addPsr4('Hubsine\\Framework\\', __DIR__ . '/src', true);

    $hfClassLoader->register();
}

###
# Init 
###

$hubsineFrameworkPlugin = \HubsineFrameworkPlugin::instance();
