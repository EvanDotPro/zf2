<?php

namespace Zend\Server;

class Service
{
    /**
     * @var string The name by which the service is exposed by the server
     */
    protected $name;

    /**
     * @var Zend\Stdlib\CallbackHandler The actual callback that will be invoked
     */
    protected $target;

    /**
     * @var array An array of signatures by which the service may be invoked
     */
    protected $signatures = array();

    /**
     * @var array An array of possible return types
     */
    protected $return = array();

    /**
     * @var string an optional description detailing what the service does
     */
    protected $description;

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
 
    /**
     * @param string $name the value to be set
     * @return Zend\Server\Service
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
 
    /**
     * Get target.
     *
     * @return Zend\Stdlib\CallbackHandler
     */
    public function getTarget()
    {
        return $this->target;
    }
 
    /**
     * Set target.
     *
     * @param callback $target the value to be set
     * @return Zend\Stdlib\CallbackHandler
     */
    public function setTarget($target)
    {
        $this->target = $target;
        return $this;
    }
 
    /**
     * Get signatures.
     *
     * @return array
     */
    public function getSignatures()
    {
        return $this->signatures;
    }
 
    /**
     * Set signatures.
     *
     * @param array $signatures the value to be set
     * @return Zend\Server\Service
     */
    public function setSignatures($signatures)
    {
        $this->signatures = $signatures;
        return $this;
    }
 
    /**
     * Get return.
     *
     * @return array
     */
    public function getReturn()
    {
        return $this->return;
    }
 
    /**
     * Set return.
     *
     * @param array $return the value to be set
     * @return Zend\Server\Service
     */
    public function setReturn($return)
    {
        $this->return = $return;
        return $this;
    }
 
    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
 
    /**
     * Set description.
     *
     * @param string $description the value to be set
     * @return Zend\Server\Service
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}
