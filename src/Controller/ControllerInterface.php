<?php

namespace Hubsine\Framework\Controller;

use Hubsine\Framework\DependencyInjection\Container;

/**
 * ControllerInterface
 *
 * @author Hubsine
 */
interface ControllerInterface {
    
    /**
     * 
     * @param Container $container
     */
    public function setContainer(Container $container);
    
    /**
     * 
     * @param string $serviceID
     */
    public function get($serviceID);
    
}
