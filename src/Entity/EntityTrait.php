<?php

namespace Hubsine\Framework\Entity;

/**
 * EntityTrait
 *
 * @author Hubsine
 */
trait EntityTrait {
    
    /**
     * 
     * @inheritdoc
     */
    public function hydrateWpEntity(array $datas){
        
        foreach ($datas as $property => $value) {
            if(property_exists($this, $property)){
                $this->$property = $value;
            }
        }
    }
}
