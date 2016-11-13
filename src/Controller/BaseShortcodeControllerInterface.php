<?php

namespace Hubsine\Framework\Controller;

/**
 * ControllerInterface
 *
 * @author Hubsine
 */
interface BaseShortcodeControllerInterface {

    /**
     * 
     * @param mixed $atts
     * @param mixed $content
     */
    public function shortcodeAction($atts, $content = '');
    
}
