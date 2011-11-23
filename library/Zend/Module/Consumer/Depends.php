<?php

namespace Zend\Module\Consumer;

interface Depends
{
    /**
     * Get an array of dependencies of a module 
     * 
     * @return array
     */
    public function getDependencies();
}
