<?php

namespace Hubsine\Framework\Templating;

use Symfony\Bridge\Twig\TwigEngine as BaseTwigEngine;
use Symfony\Component\Templating\TemplateNameParser;
use Symfony\Bridge\Twig\AppVariable;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bridge\Twig\Form\TwigRendererEngine;
use Hubsine\Framework\Http\Request;
use Hubsine\Framework\Translation\Translator;
use Symfony\Bridge\Twig\Extension\TranslationExtension;

/**
 * TwigEngine
 * 
 * @see TwigEngine
 *
 * @author Hubsine
 */
class TwigEngine extends BaseTwigEngine{

    private $_request;
    private $_translator;

    public function __construct(Request $request, Translator $translator) {
        
        $this->_request = $request;
        $this->_translator = $translator;
        
        $twigEnv = new \Twig_Environment();
        
        $this->addGlobal($twigEnv);
        $this->loadDefaultViews($twigEnv);
        $this->loadExtensions($twigEnv);

        parent::__construct($twigEnv, new TemplateNameParser());

    }
    
    private function addGlobal(\Twig_Environment $twigEnv){
        
        $app = new AppVariable();
        $requestStack = new RequestStack();
        
        $requestStack->push($this->_request);
        
        $app->setRequestStack($requestStack);
        
        $twigEnv->addGlobal('app', $app);
        
        return $twigEnv;
    }
    
    private function loadDefaultViews(\Twig_Environment $twigEnv){
        
        $appVariableReflection = new \ReflectionClass('\Symfony\Bridge\Twig\AppVariable');
        $vendorTwigBridgeDir = dirname($appVariableReflection->getFileName());
        
        // Default Resources form views in Symfony2 Form 
        $loader = new \Twig_Loader_Filesystem(array(
            $vendorTwigBridgeDir.'/Resources/views/Form',
        ));
        
        #$loader->addPath($vendorTwigBridgeDir.'/Resources/views/Form');
        #$loader->addPath(DM_VIEWS_DIR, 'DMarketPlace');
        #$loader->addPath(DM_VIEWS_FORMS_DIR, 'DMarketPlace:Forms');
        #$loader->addPath(DM_VIEWS_FORMS_DIR.'/extends', 'DMarketPlace:Forms:Extends');
        #$loader->addPath(DM_VIEWS_DIR.'/mails', 'DMarketPlace:Mails');
             
        $twigEnv->setLoader($loader);
        
        return $twigEnv;
    }
    
    private function loadExtensions(\Twig_Environment $twigEnv){
        
        $formEngine = new TwigRendererEngine();
        $formEngine->setEnvironment($twigEnv);

        $twigEnv->addExtension(new FormExtension(new TwigRenderer($formEngine)));
        $twigEnv->addExtension(new TranslationExtension($this->_translator));
        $twigEnv->addExtension(new \Twig_Extension_Debug());
    }
    
    public function addPath($path, $namespace = self::MAIN_NAMESPACE){
        
        $this->environment->getLoader()->addPath($path, $namespace = self::MAIN_NAMESPACE);
    }
}
