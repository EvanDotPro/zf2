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
    Zend\Htp\Response as HttpResponse;

/**
 * Base server HTTP response decorator
 *
 * @category   Zend
 * @package    Zend_Server
 * @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Response
{
    /**
     * HTTP Response 
     * 
     * @var Zend\Http\Response
     */
    protected $httpResponse;

    /**
     * Serializer 
     * 
     * @var Zend\Serializer\Adapter
     */
    protected $serializer;

    /**
     * Get httpResponse.
     *
     * @return Zend\Http\Response
     */
    public function getHttpResponse()
    {
        return $this->httpResponse;
    }
 
    /**
     * Set httpResponse.
     *
     * @param $httpResponse the value to be set
     * @return Zend\Server\Response
     */
    public function setHttpResponse(HttpResponse $httpResponse)
    {
        $this->httpResponse = $httpResponse;
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
     * @return Zend\Server\Response
     */
    public function setSerializer(SerializerAdapter $serializer)
    {
        $this->serializer = $serializer;
        return $this;
    }
}
