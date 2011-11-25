<?php

namespace Zend\Module\Listener\DependencyListener;

class Provision
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $version;

    /**
     * @var mixed
     */
    protected $provider;

    public function __construct($name, $version)
    {
        $this->setName($name)
             ->setVersion($version);
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
     * Get version.
     *
     * @return version
     */
    public function getVersion()
    {
        return $this->version;
    }
 
    /**
     * Set version.
     *
     * @param $version the value to be set
     */
    public function setVersion($version)
    {
        if (!$version = trim(strtolower(str_replace(' ', '', $version)))) {
            return $this;
        }
        $this->version = $version;
        return $this;
    }
 
    /**
     * Get provider.
     *
     * @return provider
     */
    public function getProvider()
    {
        return $this->provider;
    }
 
    /**
     * Set provider.
     *
     * @param $provider the value to be set
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
        return $this;
    }
}
