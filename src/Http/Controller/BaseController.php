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
//    public function __construct(Container $container){
//        $this->container = $container;
//    }
    
    /**
     * Get a service in container
     * 
     * @param string $serviceID
     * @return mixed
     */
    public function get($serviceID){
        return $this->container->get($serviceID);
    }
    
    public function setContainet(Container $container){
        $this->container = $container;
    }
}
