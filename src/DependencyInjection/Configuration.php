<?php

namespace Hubsine\Framework\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('hubsine_framework');

        $rootNode
            ->children()
                ->arrayNode('templating')
                    ->children()
                        ->floatNode('php_templating')->isRequired()->cannotBeEmpty()->defaultTrue()->end()
                        ->floatNode('twig_engine')->isRequired()->cannotBeEmpty()->defaultTrue()->end()
                ->arrayNode('twitter')
                    ->children()
                        ->integerNode('client_id')->end()
                        ->scalarNode('client_secret')->end()
                    ->end()
                ->end() // twitter
            ->end()
        ;

        return $treeBuilder;
    }
}