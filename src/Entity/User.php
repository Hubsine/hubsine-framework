<?php

namespace Hubsine\Framework\Entity;

use Hubsine\Framework\Entity\EntityInterface;
use Hubsine\Framework\Entity\EntityTrait;

/**
 * User
 * 
 * @inheritdoc
 * 
 * @property string $nickname
 * @property string $description
 * @property string $user_description
 * @property string $first_name
 * @property string $user_firstname
 * @property string $last_name
 * @property string $user_lastname
 * @property string $user_login
 * @property string $user_pass
 * @property string $user_nicename
 * @property string $user_email
 * @property string $user_url
 * @property string $user_registered
 * @property string $user_activation_key
 * @property string $user_status
 * @property string $display_name
 * @property string $spam
 * @property string $deleted
 *
 * @author Hubsine
 */
class User extends \WP_User implements EntityInterface{
    
    use EntityTrait;
    
    /**
     * Constructor 
     * 
     * @param integer $id
     * @param string $name
     * @param mixed $blog_id
     * @param array $datas Is \WP_User class public property as array format
     */
    public function __construct($id = 0, $name = '', $blog_id = '') {
    
        parent::__construct($id, $name, $blog_id);
    }
}
