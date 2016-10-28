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

$loader = new ClassLoader();

$classMap = array(
    'HubsineFrameworkPlugin'    => __DIR__ . '/HubsineFrameworkPlugin.php'
);

$loader->addClassMap($classMap);
$loader->addPsr4('Hubsine\\Framework\\', __DIR__ . '/src', true);

$loader->register();

###
# Init 
###

$hubsineFrameworkPlugin = \HubsineFrameworkPlugin::instance();
