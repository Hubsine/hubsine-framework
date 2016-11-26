<?php

namespace Hubsine\Framework\Entity;

/**
 * EntityInterface
 *
 * @author Hubsine
 */
class EntityInterface {
    
    /**
     * Hydrate wordpress class property.
     * 
     * @param array $datas Is wordpress class attributs
     */
    public function hydrateWpEntity(array $datas);
}
