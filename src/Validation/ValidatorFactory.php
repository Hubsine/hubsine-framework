<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Hubsine\Framework\Validation;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Symfony\Component\Validator\Validation;

/**
 * ValidationFactory
 * 
 * @link http://symfony.com/doc/current/validation.html How use validator
 *
 * @author Hubsine
 */
class ValidatorFactory{
    
    /**
     *
     * @var Symfony\Component\Validator\Validator\RecursiveValidator
     */
    private  $_defaultValidator;
    
    /**
     *
     * @var array 
     */
    private $config = array(
        'enableAnnotationMapping'   => true,
        'addMethodMapping'  => true,
        'addYamlMappings'   => false,
        'addXmlMappings'    => false
    );

    /**
     * Constructor
     */
    public function __construct() {
        
        $this->loadConstraints();
        $this->_defaultValidator = Validation::createValidatorBuilder()
                ->addMethodMapping('loadValidatorMetadata')
                ->enableAnnotationMapping()
                ->getValidator();
        
    }
    
    /**
     * Load Symfony Validator constraints
     */
    private function loadConstraints(){
        
        if($currentConstraintFolder = opendir(HF_VENDOR_DIR."/symfony/validator/Constraints")){
            while (false !== ($constraintFile = readdir($currentConstraintFolder))) {
                if(pathinfo($constraintFile, PATHINFO_EXTENSION) === 'php'){ 
                    AnnotationRegistry::registerFile(HF_VENDOR_DIR."/symfony/validator/Constraints/".$constraintFile);
                }
            }
            closedir($currentConstraintFolder);
        }
    }
    
    /**
     * Get default validator. Validate with annotation or metadata class
     * 
     * @return Symfony\Component\Validator\Validator\RecursiveValidator
     */
    public function getDefaultValidator(){
        return $this->_defaultValidator;
    }

    /**
     * Get validator
     * 
     * @param array $configArgs 
     * @return Symfony\Component\Validator\Validator\RecursiveValidator Validator to validate object or proprety
     */
    public function getValidator($configArgs = array()){
        
        $config = wp_parse_args($configArgs, $this->config);
        $validator = Validation::createValidatorBuilder();

        if(!$config['addYamlMappings'] && !$config['addXmlMappings']){
            return $this->getDefaultValidator();
        }
        
        if($config['enableAnnotationMapping']){
            $validator->enableAnnotationMapping();
        }
        
        if($config['addMethodMapping']){
            $validator->addMethodMapping('loadValidatorMetadata');
        }
        
        if($config['addYamlMappings']){

            $yamlConfigPaths = $config['addYamlMappings'];
            
            if(is_array($yamlConfigPaths)){
                $validator->addYamlMappings($yamlConfigPaths);
            }else{
                $validator->addYamlMapping($yamlConfigPaths);
            }
        }
        
        if($config['addXmlMappings']){
            
            $xmlConfigPaths = $config['addXmlMappings'];
            
            if(is_array($xmlConfigPaths)){
                $validator->addXmlMappings($xmlConfigPaths);
            }else{
                $validator->addXmlMapping($xmlConfigPaths);
            }
        }
        
        return $validator->getValidator();
    }
}
