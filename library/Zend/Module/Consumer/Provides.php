<?php

namespace Zend\Module\Consumer;

interface Provides
{
    /**
     * Get an array of provisions from a module 
     * 
     * @return array
     */
    public function getProvides();
}
