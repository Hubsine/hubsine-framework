<?php

namespace Hubsine\Framework\DependencyInjection\Loader;

use Hubsine\Framework\DependencyInjection\Container;
use Symfony\Component\Config\FileLocator;
use Hubsine\Framework\DependencyInjection\Loader\YamlFileLoader;
use Hubsine\Framework\DependencyInjection\Loader\PhpFileLoader;
use Hubsine\Framework\DependencyInjection\Loader\XmlFileLoader;


/**
 * LoaderFactory is use to get FileLoader
 *
 * @author Hubsine
 */
class LoaderFactory {
    
    private static $loaders = array(
        'yml' => YamlFileLoader::class, 
        'php' => PhpFileLoader::class, 
        'xml' => XmlFileLoader::class
        );

    /**
     *
     * @var Hubsine\Framework\DependencyInjection\Container
     */
    private $container;
    
    /**
     * 
     * @param Container $container
     */
    public function __construct(Container $container) {
        $this->container = $container;
    }

    /**
     * Get Loader for load into container your config file in yml, php or xml format
     * 
     * @param stringt $loaderType yml | php | xml
     * @param mixed $paths Paths where your config file is located
     * 
     * @return boolean|Symfony\Component\Config\Loader\LoaderInterface
     */
    public function getLoaderBy($loaderType, $paths = array()){
        
        $fileLocator = new FileLocator($paths);
        
        foreach (self::$loaders as $type => $loaderClass) {
            
            if($loaderType === $type){
                return new $loaderClass($this->container, $fileLocator);
            }
        }
        
        return false;
    }
}
