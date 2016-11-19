<?php

namespace Hubsine\Framework\Repository;

/**
 * EntityManagerInterface
 *
 * @author Hubsine
 */
interface EntityManagerInterface {

    /**
     * 
     * Find and return one result
     * 
     * @param string $entity
     * @param integer $id
     */
    public function find($entity, $id);
    
    /**
     * 
     * Find and return one or sevral result
     * 
     * @param string $entiy
     */
    public function findAll($entiy);
    
    /**
     * 
     * Find and return one or sevral result by criteria
     * 
     * @param array $criteria
     */
    public function findBy($criteria);
    
    /**
     * 
     * Find and return one result by criteria
     * 
     * @param array $criteria
     */
    public function findOneBy($criteria);
    
    /**
     * 
     * Delete one or sevral entity par criteria
     * 
     * @param string $entity
     * @param array $where
     * @param mixed $whereFormat
     */
    public function deleteBy($entity, array $where, $whereFormat = null);
    
    /**
     * 
     * Insert UserMeta entity in database
     * 
     * @param Hubsine\Framework\Entity\EntityInterface $metas
     */
    public function insertUserMeta($metas);
    
    /**
     * 
     * Insert Hubsine\Framework\Entity\EntityInterface in database
     * 
     * @param Hubsine\Framework\Entity\EntityInterface $entity
     */
    public function insert($entity);
}
