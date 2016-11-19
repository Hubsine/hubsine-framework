<?php

namespace Hubsine\Framework\Repository;

use Hubsine\Framework\Repository\AbstractEntityManager;

/**
 * EntityManager
 *
 * @author Hubsine
 */
class EntityManager extends AbstractEntityManager{
    
    /**
     * Get a repository by class
     * EntityManager (_em) is injected in your repository
     * 
     * @param Hubsine\Framework\Repository\RepositoryInterface $repositoryClass
     * @return Hubsine\Framework\Repository\Entity\RepositoryInterface
     * 
     */
    public function getRepository($repositoryClass){
        
        try {
            
            $repo = new $repositoryClass();
            $repo->_em = $this;
                
            return $repo;
                    
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
   
}
