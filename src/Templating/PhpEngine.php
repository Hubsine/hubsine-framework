<?php

namespace Hubsine\Framework\Templating;

use Symfony\Component\Templating\PhpEngine as BasePhpEngine;
use Symfony\Component\Templating\TemplateNameParser;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\Helper\SlotsHelper;

/**
 * PhpEngine
 * 
 * @see PhpEngine
 *
 * @author Hubsine
 */
class PhpEngine extends BasePhpEngine{

    /**
     * Constructor 
     */
    public function __construct() {
        
        $loader = new FilesystemLoader(HF_RESOURCES_DIR . '/views');
        $tmplNameParser = new TemplateNameParser();
        $slotsHelper = new SlotsHelper();
        
        parent::__construct($tmplNameParser, $loader, array($slotsHelper));
    }
}
