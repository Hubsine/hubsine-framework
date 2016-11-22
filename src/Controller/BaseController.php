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
    
    public function createBuilderForm($type = 'Symfony\Component\Form\Extension\Core\Type\FormType', $data = null, array $options = array()){
        return $this->get('form.factory')->createBuilder($type, $data, $options);
    }

    public function renderView($name, $parameters = array()){
        return $this->get('templating')->render($name, $parameters);
    }
    
    public function validate($entityObject){
        return $this->get('validator')->validate($entityObject);      
    }
    
    public function trans($id, array $parameters = array(), $domain = null, $locale = null){
        return $this->get('translator')->trans($id, $parameters, $domain, $locale);
    }
    
    public function flashBag(){
        return $this->get('session')->getFlashBag();
    }
   
}
