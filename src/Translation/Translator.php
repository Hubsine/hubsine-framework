<?php

namespace Hubsine\Framework\Translation;

use Symfony\Component\Translation\Translator as BaseTranslator;
use Symfony\Component\Translation\Loader\YamlFileLoader;
use Symfony\Component\Translation\Loader\XliffFileLoader;
use Symfony\Component\Translation\Loader\LoaderInterface;

/**
 * Translator
 * 
 * @link http://symfony.com/doc/3.1/translation.html
 * @link http://symfony.com/doc/current/components/translation.html
 *
 * @author Hubsine
 */
class Translator extends BaseTranslator {
    
    #public $translator;
    #private $defaultDomains = array('forms', 'messages', 'validators', 'admin');
    private $_defaultLoaders = array('yaml', 'xlf', 'php');

    public function __construct($locale = null) {
        
        $locale = (null == $locale) ? self::getLocaleFromWp() : $locale;
        $this->setLocale($locale);

        parent::__construct($locale);
        
        ###
        # Validator message of Sf2 Form compomnement
        ###
        
        $this->addLoader('yaml', new YamlFileLoader());
        $this->addLoader('xliff', new XliffFileLoader());
        
        $this->loadDefaultTranslations();
    }
    
    /**
     * 
     * @inheritdoc
     * 
     * @param string $format
     * @param LoaderInterface $loader
     * 
     * @return boolean
     */
    public function addLoader($format, LoaderInterface $loader) {
        
        if(array_key_exists($format, $this->_defaultLoaders)
                && !array_key_exists($format, $this->getLoaders())){
            
            parent::addLoader($format, $loader);
            
            return true;
        }
        
        return false;
    }

    private function loadDefaultTranslations(){
        
        //Load Symfony Validator Translation       
        $this->addResource(
            'xlf',
            HF_VENDOR_FORM_DIR.'/Resources/translations/validators.'.$this->getLocale().'.xlf',
            $this->getLocale(),
            'validators'
        );
        $this->addResource(
            'xlf',
            HF_VENDOR_VALIDATOR_DIR.'/Resources/translations/validators.'.$this->getLocale().'.xlf',
            $this->getLocale(),
            'validators'
        );
        
    }
    
    public static function getLocaleFromWp(){
        return explode('_', get_locale())[0];
    }
}
