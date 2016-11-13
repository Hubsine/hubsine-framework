<?php

namespace Hubsine\Framework\Form;

use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\Csrf\CsrfExtension;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\Form\Extension\Core\CoreExtension;
use Symfony\Component\Security\Csrf\TokenStorage\NativeSessionTokenStorage;
use Symfony\Component\Security\Csrf\TokenGenerator\UriSafeTokenGenerator;
use Symfony\Component\Security\Csrf\CsrfTokenManager;
use Hubsine\Framework\Validation\ValidatorFactory;

/**
 * Description of DmFormFactory
 *
 * @author nsi
 */
class FormFactory{
    
    private $factory;
    private $builder;
    private $extensions;
    private $validatorFactory;

    public function __construct(ValidatorFactory $validatorFactory) {
        
        $this->builder = Forms::createFormFactoryBuilder();
        $this->factory = Forms::createFormFactory();
        $this->validatorFactory = $validatorFactory;
        
        $this->loadExtensions(); 

    }
    
    protected function loadExtensions(){

        // CSRF Extension
        $csrfGenerator = new UriSafeTokenGenerator();
        $csrfStorage = new NativeSessionTokenStorage();
        $csrfManager = new CsrfTokenManager($csrfGenerator, $csrfStorage);        
        $csrfExtension = new CsrfExtension($csrfManager);
        
        $this->extensions[] = $csrfExtension;
        
        
        // Validator Extension        
        $validatorFactory = $this->validator->getValidator(); 
        $validatorFactoryExtension = new  ValidatorExtension($validatorFactory);
        
        $this->extensions[] = $validatorFactoryExtension;  
        
        
        // HttpFoundation Extension
        $httpFoundation = new HttpFoundationExtension();
        $this->extensions[] = $httpFoundation;
        
        //Core
        $core = new CoreExtension();
        $this->extensions[] = $core;
        
    }
    
    public function createBuilder($type = 'Symfony\Component\Form\Extension\Core\Type\FormType', $data = null, array $options = array()){

        return $formFactory = $this->builder
            ->addExtensions($this->extensions)
            ->getFormFactory()
            ->createBuilder($type, $data, $options)
        ;
    }
    
    
}
