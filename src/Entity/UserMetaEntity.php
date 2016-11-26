<?php

namespace Hubsine\Framework\Entity;

use Hubsine\Framework\Entity\EntityInterface;

/**
 * UserMeta
 *
 * @author Hubsine
 */
class UserMetaEntity implements EntityInterface{
    
    /**
     *
     * @var int user_meta
     */
    public $user_id;
    
    /**
     *
     * @var string user_meta
     */
    public $meta_key;
    
    /**
     *
     * @var string user_meta
     */
    public $meta_value;
}
