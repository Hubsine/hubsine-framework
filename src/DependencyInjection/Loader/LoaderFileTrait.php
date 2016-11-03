<?php

namespace Hubsine\Framework\DependencyInjection\Loader;

/**
 * Description of LoaderFileTrait
 *
 * @author Hubsine
 */
trait LoaderFileTrait {
    
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
