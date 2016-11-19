<?php

namespace Hubsine\Framework\Repository\Entity;

use Hubsine\Framework\Repository\Entity\RepositoryInterface;

/**
 * BaseRepository
 *
 * @author Hubsine
 */
class BaseRepository implements RepositoryInterface{
    
    /**
     *
     * @var Hubsine\Framework\Repository\EntityManagerInterface
     */
    public $_em;
}
