<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Server
 * @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */


/**
 * @namespace
 */
namespace Zend\Server;

use Zend\Serializer\Adapter as SerializerAdapter,
    Zend\Htp\Request as HttpRequest;

/**
 * Base server HTTP request decorator
 *
 * @category   Zend
 * @package    Zend_Server
 * @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Request
{
    /**
     * HTTP Request 
     * 
     * @var Zend\Http\Request
     */
    protected $httpRequest;

    /**
     * Serializer 
     * 
     * @var Zend\Serializer\Adapter
     */
    protected $serializer;

    /**
     * Get httpRequest.
     *
     * @return Zend\Http\Request
     */
    public function getHttpRequest()
    {
        return $this->httpRequest;
    }
 
    /**
     * Set httpRequest.
     *
     * @param $httpRequest the value to be set
     * @return Zend\Server\Request
     */
    public function setHttpRequest(HttpRequest $httpRequest)
    {
        $this->httpRequest = $httpRequest;
        return $this;
    }
 
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
}
