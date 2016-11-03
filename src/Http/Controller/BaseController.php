<?php

namespace Hubsine\Framework\http\Controller;

use Hubsine\Framework\DependencyInjection\Container;
use Hubsine\Framework\Http\Controller\ControllerInterface;

/**
 * BaseController
 *
 * @author Hubsine
 */
class BaseController implements ControllerInterface{
    
    protected $container;
    
    /**
     * Constructor
     * 
     * @param Container $container
     */
    private function __construct(){
    }
    
    /**
     * Get a service in container
     * 
     * @param string $serviceID
     * @return mixed
     */
    public function get($serviceID){
        return $this->container->get($serviceID);
    }
    
    public function setContainer(Container $container){
        $this->container = $container;
    }
}
