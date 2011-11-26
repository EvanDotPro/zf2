<?php

namespace Zend\Module\Listener\DependencyListener;

class Dependency
{
    /**
     * @var string
     */
    protected $name;

    /**
     * dependants 
     * 
     * @var array
     */
    protected $dependants = array();

    /**
     * regex for getting version operators
     * @var string
     */
    protected $operators = '/(<|lt|<=|le|>|gt|>=|ge|==|=|eq|!=|<>|ne)?\s?(\d.*)/';

    /**
     * __construct 
     * 
     * @param string $name 
     */
    public function __construct($name)
    {
        $this->setName($name);
    }

    /**
     * Get name.
     *
     * @return name
     */
    public function getName()
    {
        return $this->name;
    }
 
    /**
     * Set name.
     *
     * @param $name the value to be set
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * addDependant 
     * 
     * @param mixed $module 
     * @param mixed $version 
     */
    public function addDependant($module, $version)
    {
        if (!$version = trim(strtolower(str_replace(' ', '', $version)))) {
            return $this;
        }
        preg_match($this->operators, $version, $matches, PREG_OFFSET_CAPTURE);
        $versionNumber = $matches[2][0];
        $operator = $matches[1][0] ?: '>=';
        $this->dependants[$version][] = $module;
        return $this;
    }

    public function getDependants()
    {
        return $this->dependants;
    }
}
