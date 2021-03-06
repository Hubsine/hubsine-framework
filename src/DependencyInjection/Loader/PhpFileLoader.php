<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hubsine\Framework\DependencyInjection\Loader;

use Symfony\Component\DependencyInjection\Loader\PhpFileLoader as BasePhpFileLoader;
use Hubsine\Framework\DependencyInjection\Loader\LoaderFileTrait;

/**
 * PhpFileLoader loads service definitions from a PHP file.
 *
 * The PHP file is required and the $container variable can be
 * used within the file to change the container.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class PhpFileLoader extends BasePhpFileLoader
{
    use LoaderFileTrait;
    
    /**
     * {@inheritdoc}
     */
    public function load($resource, $type = null)
    {
        // the container and loader variables are exposed to the included file below
        $container = $this->container;
        $loader = $this;

        $path = $this->locator->locate($resource);
        $this->setCurrentDir(dirname($path));
        $this->container->addResource(new FileResource($path));

        include $path;
        
        // Init shortcode
        $this->loadShortcodes();
        
        // Init widgets
        $this->loadWidgets();
    }

    /**
     * {@inheritdoc}
     */
    public function supports($resource, $type = null)
    {
        return is_string($resource) && 'php' === pathinfo($resource, PATHINFO_EXTENSION);
    }
}
