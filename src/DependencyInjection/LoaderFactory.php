<?php

namespace Hubsine\Framework\DependencyInjection;

use Hubsine\Framework\DependencyInjection\Container;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Loader\DirectoryLoader;
use Symfony\Component\DependencyInjection\Loader\ClosureLoader;


/**
 * LoaderFactory gère le chargement des fichiers de configurations des plugins et thème
 *
 * @author Hubsine
 */
class LoaderFactory {
    
    private static $loaders = array(
        'yml' => YamlFileLoader::class, 
        'php' => PhpFileLoader::class, 
        'xml' => XmlFileLoader::class
        );

    protected $container;
    
    public function __construct(Container $container) {
        $this->container = $container;
    }

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
