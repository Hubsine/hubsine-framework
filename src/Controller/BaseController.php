<?php

namespace Hubsine\Framework\Controller;

use Hubsine\Framework\DependencyInjection\Container;
use Hubsine\Framework\Controller\ControllerInterface;

/**
 * BaseController
 *
 * @author Hubsine
 */
class BaseController implements ControllerInterface{
    
    protected $container;
    
    /**
     * Get a service in container
     * 
     * @param string $serviceID
     * @return mixed
     */
    public function get($serviceID){
        return $this->container->get($serviceID);
    }
    
    /**
     * 
     * @param Container $container
     */
    public function setContainer(Container $container){
        $this->container = $container;
    }
}
