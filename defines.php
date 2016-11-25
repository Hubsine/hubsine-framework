<?php

define('HF_PLUGIN_NAME', 'Hubsine Framework');

###
# Redux OPT NAME
###

define('HF_OPT_NAME', 'hubsine-framework');

###
# PLUGIN DIR
###

define('HF_PLUGIN_DIR',            realpath( __DIR__ ) ); 

###
# Racine DIR
###

define('HF_SRC_DIR',               HF_PLUGIN_DIR . '/src');
define('HF_LIB_DIR',               HF_PLUGIN_DIR . '/lib');
define('HF_VENDOR_DIR',            HF_PLUGIN_DIR . '/vendor');
define('HF_RESOURCES_DIR',         HF_PLUGIN_DIR . '/resources');

###
# Resources DIR
###

define('HF_VIEWS_DIR',             HF_RESOURCES_DIR . '/views');
define('HF_VIEWS_FORMS_DIR',       HF_VIEWS_DIR     . '/forms');
define('HF_LOCALES_TRANS_DIR',     HF_RESOURCES_DIR . '/translations');
define('HF_CONFIG_DIR',            HF_RESOURCES_DIR . '/config');

###
# Plugin URI 
###

define('HF_PLUGIN_URI', plugins_url('/hubsine-framework'));
define('HF_RESOURCES_URI', HF_PLUGIN_URI.'/src/resources');

###
# Vendor DIR
###

define('HF_VENDOR_FORM_DIR', HF_VENDOR_DIR.'/symfony/form');
define('HF_VENDOR_VALIDATOR_DIR', HF_VENDOR_DIR.'/symfony/validator');

###
# Vendor URI 
###

define('HF_VENDOR_URI', HF_PLUGIN_URI.'/vendor');
define('HF_BOOTSTRAP_URI', HF_VENDOR_URI.'/twbs/bootstrap');
define('HF_FORTAWESOME_URI', HF_VENDOR_URI.'/fortawesome/font-awesome');

// DB
//define('USER_TABLE', 'wp_users');
//define('POST_TABLE', 'wp_posts');