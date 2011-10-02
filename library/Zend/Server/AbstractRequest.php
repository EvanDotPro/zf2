<?php

namespace Zend\Server;

use Zend\Serializer\Adapter as SerializerAdapter,
    Zend\Stdlib\Request as StdRequest;

abstract class AbstractRequest extends StdRequest
{
    /**
     * Serializer 
     * 
     * @var Zend\Serializer\Adapter
     */
    protected $serializer;

    /**
     * Get serializer.
     *
     * @return Zend\Serializer\Adapter
     */
    public function getSerializer()
    {
        return $this->serializer;
    }
 
    /**
     * Set serializer.
     *
     * @param Zend\Serializer\Adapter $serializer the value to be set
     * @return Zend\Server\Request
     */
    public function setSerializer(SerializerAdapter $serializer)
    {
        $this->serializer = $serializer;
        return $this;
    }

    /**
     * __toString magic method 
     * 
     * @return string
     */
    public function __toString()
    {
        $this->toString();
    }
}
