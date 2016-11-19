<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Hubsine\Framework\Repository;

use Hubsine\Framework\Repository\EntityManagerInterface;

/**
 * AbstractEntityManager
 *
 * @author Hubsine
 */
abstract class AbstractEntityManager implements EntityManagerInterface{
    
    /**
     *
     * @var \wpdb
     */
    public $wpdb;
    
    /**
     *
     * @var string Wordpress Table Prefix
     */
    public $tablePrefix;
    
    /**
     * Constructor 
     * 
     * @global \wpdb $wpdb
     */
    public function __construct() {
        
        global $wpdb;
        
        $this->wpdb = $wpdb;
        $this->tablePrefix = $wpdb->base_prefix;
        
    }

    /**
     * {@inheritdoc}
     */
    public function find($entity, $id){}
    
    /**
     * {@inheritdoc}
     */
    public function findAll($entity){}
    
    /**
     * {@inheritdoc}
     */
    public function findBy($criteria){}
    
    /**
     * {@inheritdoc}
     */
    public function findOneBy($criteria){}
    
    /**
     * {@inheritdoc}
     */
    public function deleteBy($entity, array $where, $whereFormat = null){}
    
    /**
     * {@inheritdoc}
     */
    public function insertUserMeta($metas){}
    
    /**
     * {@inheritdoc}
     */
    public function insert($entity){}
    
    
    
}
