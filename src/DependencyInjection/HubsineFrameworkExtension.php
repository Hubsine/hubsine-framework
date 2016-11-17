<?php

namespace Hubsine\Framework\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class HubsineFrameworkExtension extends Extension implements PrependExtensionInterface
{
    public function prepend(ContainerBuilder $container)
    {
        // get all bundles
        $bundles = $container->getParameter('kernel.bundles');
        // determine if AcmeGoodbyeBundle is registered
        if (!isset($bundles['AcmeGoodbyeBundle'])) {
            // disable AcmeGoodbyeBundle in bundles
            $config = array('use_acme_goodbye' => false);
            foreach ($container->getExtensions() as $name => $extension) {
                switch ($name) {
                    case 'acme_something':
                    case 'acme_other':
                        // set use_acme_goodbye to false in the config of
                        // acme_something and acme_other note that if the user manually
                        // configured use_acme_goodbye to true in the app/config/config.yml
                        // then the setting would in the end be true and not false
                        $container->prependExtensionConfig($name, $config);
                        break;
                }
            }
        }

        // process the configuration of AcmeHelloExtension
        $configs = $container->getExtensionConfig($this->getAlias());
        // use the Configuration class to generate a config array with
        // the settings "acme_hello"
        $config = $this->processConfiguration(new Configuration(), $configs);

        // check if entity_manager_name is set in the "acme_hello" configuration
        if (isset($config['entity_manager_name'])) {
            // prepend the acme_something settings with the entity_manager_name
            $config = array('entity_manager_name' => $config['entity_manager_name']);
            $container->prependExtensionConfig('acme_something', $config);
        }
    }

    public function load(array $configs, ContainerBuilder $container) {
        
    }

}
