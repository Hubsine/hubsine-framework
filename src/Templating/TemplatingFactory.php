<?php

namespace Hubsine\Framework\Templating;

use Symfony\Component\Templating\DelegatingEngine;
use Hubsine\Framework\Templating\TwigEngine;
use Hubsine\Framework\Templating\PhpEngine;

/**
 * TemplatingFactory
 *
 * @author Hubsine
 */
class TemplatingFactory extends DelegatingEngine{
    
    /**
     * 
     * Constructor 
     * 
     * @param TwigEngine $twigEngine
     * @param PhpEngine $phpEngine
     */
    public function __construct(TwigEngine $twigEngine, PhpEngine $phpEngine) {
        parent::__construct(array($twigEngine, $phpEngine));
    }
}
