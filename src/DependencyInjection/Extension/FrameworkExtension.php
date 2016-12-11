<?php

namespace Hubsine\Framework\DependencyInjection\Extension;

use Symfony\Component\DependencyInjection\Extension\Extension;
use Hubsine\Framework\DependencyInjection\Container;

/**
 * FrameworkExtension
 *
 * @author Hubsine
 */
class FrameworkExtension extends Extension{

    /**
     * {@inheritdoc}
     */
    public function load(array $configs, Container $container) {
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getNamespace()
    {
        return 'http://symfony.com/schema/dic/framework';
    }
}
