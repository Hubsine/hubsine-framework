<?php

namespace Hubsine\Framework\Http;

use Symfony\Component\HttpFoundation\Session\Session as BaseSession;
use Symfony\Component\HttpFoundation\Session\Storage\SessionStorageInterface;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBagInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

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

    /**
     * Constructor
     * 
     * @param SessionStorageInterface $storage    A SessionStorageInterface instance
     * @param AttributeBagInterface   $attributes An AttributeBagInterface instance, (defaults null for default AttributeBag)
     * @param FlashBagInterface       $flashes    A FlashBagInterface instance (defaults null for default FlashBag)
     * 
     * @see parent::__construct()
     */
    public function __construct(SessionStorageInterface $storage = null, AttributeBagInterface $attributes = null, FlashBagInterface $flashes = null) {
        parent::__construct($storage, $attributes, $flashes);
    }
    
}
