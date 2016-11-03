<?php

namespace Hubsine\Framework\Http\Controller;

/**
 * ControllerInterface
 *
 * @author Hubsine
 */
interface BaseShortcodeControllerInterface {

    public function shortcodeAction($atts, $content = '');
    
}
