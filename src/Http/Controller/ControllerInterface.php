<?php

namespace Hubsine\Framework\Http\Controller;

use Hubsine\Framework\DependencyInjection\Container;

/**
 * ControllerInterface
 *
 * @author Hubsine
 */
interface ControllerInterface {
    
    public function setContainer(Container $container);
    
    public function get($serviceID);
    
}
