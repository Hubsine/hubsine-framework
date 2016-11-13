<?php

namespace Hubsine\Framework\DependencyInjection\Loader;

/**
 * LoaderFileTrait
 *
 * @author Hubsine
 */
trait LoaderFileTrait {
    
    /**
     * load and init shortcode class taged by wp.shortcode
     * 
     * @uses add_shortcode() 
     */
    public function loadShortcodes(){
        
        $shortcodes = $this->container->findTaggedServiceIds('wp.shortcode');
        
        foreach ($shortcodes as $id => $tags) {
            
            $definition = $this->container->getDefinition($id);
            
            if( ! $definition->isSynthetic() && ! shortcode_exists($id) ){
                
                $shortcodeController = $this->container->get($id);
                $shortcodeController->setContainer($this->container);
                
                add_shortcode($id, array($shortcodeController, 'shortcodeAction'));
            }
        }
    }
}
