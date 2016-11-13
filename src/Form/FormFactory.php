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
use Symfony\Component\Validator\Validator\RecursiveValidator;

/**
 * FormFactory
 *
 * @author nsi
 */
class FormFactory{
    
    private $builder;
    private $extensions;
    private $validatorFactory;

    /**
     * Constructor 
     * 
     * @param ValidatorFactory $validatorFactory
     */
    public function __construct(ValidatorFactory $validatorFactory) {
        
        $this->builder = Forms::createFormFactoryBuilder();
        $this->validatorFactory = $validatorFactory;
        
        $this->loadExtensions(); 

    }
    
    /**
     * Load default form extension 
     */
    private function loadExtensions(){

        // CSRF Extension
        $csrfGenerator = new UriSafeTokenGenerator();
        $csrfStorage = new NativeSessionTokenStorage();
        $csrfManager = new CsrfTokenManager($csrfGenerator, $csrfStorage);        
        $csrfExtension = new CsrfExtension($csrfManager);
        
        $this->extensions[] = $csrfExtension;
        
        // HttpFoundation Extension
        $httpFoundation = new HttpFoundationExtension();
        $this->extensions[] = $httpFoundation;
        
        //Core
        $core = new CoreExtension();
        $this->extensions[] = $core;
        
    }
    
    /**
     * 
     * Get a form instance 
     * 
     * @param Symfony\Component\Form\FormInterface $type
     * @param mixed $data
     * @param array $options
     * @param RecursiveValidator $validator
     * 
     * @return Symfony\Component\Form\Form
     */
    public function createBuilder($type = 'Symfony\Component\Form\Extension\Core\Type\FormType', 
            $data = null, array $options = array(), RecursiveValidator $validator = null){

        $formFactory = $this->builder
            ->addExtensions($this->extensions);
        
        if(null === $validator){
            $formFactory->addExtension(new ValidatorExtension($this->validatorFactory->getDefaultValidator()));
        }else{
            $formFactory->addExtension(new ValidatorExtension($validator));
        }
        
        return $formFactory->getFormFactory()
            ->createBuilder($type, $data, $options);
        
    }
    
    
}
