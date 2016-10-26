<?php

namespace Hubsine\Framework\Http;

use Symfony\Component\HttpFoundation\Session\Session as BaseSession;

/**
 * Session 
 * 
 * - Session
 * - Attributes
 * - Flash Bag Message 
 *
 * @author Hubsine
 */
class Session extends BaseSession{

    public function __construct(\Symfony\Component\HttpFoundation\Session\Storage\SessionStorageInterface $storage = null, \Symfony\Component\HttpFoundation\Session\Attribute\AttributeBagInterface $attributes = null, \Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface $flashes = null) {
        parent::__construct($storage, $attributes, $flashes);
    }
    
}
