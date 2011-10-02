<?php

namespace Zend\Server;

use Zend\Serializer\Adapter as SerializerAdapter,
    Zend\Stdlib\Response as StdResponse;

abstract class AbstractResponse extends StdResponse
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
     * @return Zend\Server\Response
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
        return $this->toString();
    }
}
