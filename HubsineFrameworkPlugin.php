<?php

use Hubsine\Framework\DependencyInjection\Container;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Yaml\Yaml;
use Hubsine\Framework\Http\Session;
use Hubsine\Framework\Http\Request;

/**
 * Description of HubsineFrameworkPlugin
 *
 * @author Hubsine
 */
class HubsineFrameworkPlugin {
    
    const VERSION = '0.1';
    
    private static $_instance;
    private $_container;

    public static function instance()
    {
        
        if( !self::$_instance )
        {
            self::$_instance = new self();
            self::$_instance->hooks();
            self::$_instance->initContainer();
        }
        
        return self::$_instance;
    }
    
    public static function getInstance()
    {
        return self::instance();
    }
    
    public function getContainer(){
        return $this->_container;
    }

    public static function getLocaleFromWp(){
        return explode('_', get_locale())[0];
    }

    protected function initContainer(){
        
        $container = new Container();
        $container->set('container', $container);
        
        ###
        # Config
        ###
        
        $fileLocator = new FileLocator(DM_CONFIG_DIR); 
        $loader     = new YamlFileLoader($container, $fileLocator);
        
        $loader->load('parameters.yml');
        $loader->load('services.yml');
        
        ###
        # Init Synthetic Service = 
        #   - Session
        #   - Request
        ###

        ### Session ###
        
        $session = new Session();
        
        ### Request ###
        
        $request = Request::createFromGlobals();
        $request->setSession($session);
        $request->setLocale(self::getLocaleFromWp());
        
        ###
        # Init Default Service Before Used
        ###
        
        
        ###
        # Synthetic serice 
        ###
        
        $container->set('session', $session);
        $container->set('request', $request);
        
        ### Final ###
        
        $this->_container = $container;
        
    }
    
    
    private function hooks(){
        
        add_action('init', array($this, 'dm_session_start'));
        add_action('admin_enqueue_scripts', array($this, 'load_wp_back_end_resources'));
        add_action('wp_enqueue_scripts', array($this, 'load_wp_front_end_resources'));
        
    }
    
    public function dm_session_start(){
        
        if(!session_id()){
            session_start();
        }
    }
    
    public function load_wp_back_end_resources(){
        
        ###
        # CSS Back End
        ###
        
        ###
        # JS Back End
        ###
        wp_enqueue_script(
                'dm-back-end',
                HF_RESOURCES_URI . '/js/back_end.js',
                array('jquery'),
                false,
                true
                );
        
        wp_localize_script('dm-back-end', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
    }
    
    public function load_wp_front_end_resources(){
        
        ###
        # CSS Front End
        ###
//        wp_enqueue_style(
//                'fortawesome', 
//                HF_FORTAWESOME_URI . '/css/font-awesome.min.css', 
//                array(), 
//                '4.6.3', 
//                false);
        
//        wp_enqueue_style(
//                'bootstrap', 
//                HF_BOOTSTRAP_URI . '/dist/css/bootstrap.min.css', 
//                array(), 
//                '3.3.7', 
//                false);
        
        wp_enqueue_style(
                'hubsine-framework',
                HF_RESOURCES_URI . '/css/hubsine-framewwork.css',
                array(),
                false,
                false
                );
        
        ###
        # JS Front End
        ###
//        wp_enqueue_script(
//                'bootstrap-min', 
//                HF_BOOTSTRAP_URI . '/dist/js/bootstrap.min.js', 
//                array(), 
//                '3.3.7', 
//                true);

        wp_enqueue_script(
                'hubsine-framework', 
                HF_RESOURCES_URI . '/js/hubsine-framework.js',
                array(), 
                false, 
                true);   
    }
    
   
}
