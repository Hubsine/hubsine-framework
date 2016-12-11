<?php

namespace Hubsine\Framework\DependencyInjection\Extension;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * FrameworkConfig
 *
 * @author Hubsine
 */
class FrameworkConfig implements ConfigurationInterface{
    
    public function getConfigTreeBuilder(){
        
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('framework');
        
        $rootNode->children()
                    ->enumNode('is')
                        ->isRequired()
                        ->cannotBeEmpty()
                        ->values(array('theme', 'child-theme', 'plugin'))
                    ->end()
                    ->scalarNod('theme_or_plugin_dir')
                        ->isRequired()
                        ->cannotBeEmpty()
                    ->end() 
                    ->arrayNode('directory')
                        ->canBeDisabled()
                        ->children()
                            ->scalarNod('resources_dir')
                                ->isRequired()
                                -cannotBeEmpty()
                                ->defaultValue('resources')
                            ->end()
                            ->scalarNode('config_dir')
                                ->isRequired()
                                -cannotBeEmpty()
                                ->defaultValue('config')
                                ->info('Default value is "resources/config".')
                            ->end()
                            ->scalarNode('translation_dir')
                                ->defaultValue('translations')
                            ->end()
                        ->end()
                    ->end()
                    
                ->end();    
                
                
        
        return $treeBuilder;
    }
}
