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
#require_once __DIR__ . '/HubsineFrameworkPlugin.php';

###
# Used
###

use Composer\Autoload\ClassLoader;
use Hubsine\Framework\DependencyInjection\Container;
#use Hubsine\HubsineFrameworkPlugin;

###
# Class Loader By Composer
###

$loader = new ClassLoader();

$classMap = array(
    'HubsineFrameworkPlugin'    => __DIR__ . '/HubsineFrameworkPlugin.php'
);

$loader->addClassMap($classMap);
#$loader->addPsr4('Hubsine\\', __DIR__);
#$loader->addPsr4('Hubsine\\', __DIR__, true);
$loader->addPsr4('Hubsine\\Framework\\', __DIR__ . '/src', true);
#$loader->addPsr4('Hubsine\\Framework\\DependencyInjection\\', __DIR__ . '/src/DependencyInjection');

$loader->register();

###
# Init 
###
#$container = new Container();
$hubsineFrameworkPlugin = \HubsineFrameworkPlugin::instance();
