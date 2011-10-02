<?php

namespace Zend\JsonRpc;

use Zend\Stdlib\Dispatchable,
    Zend\EventManager\EventCollection,
    Zend\EventManager\EventManager,
    Zend\Stdlib\RequestDescription,
    Zend\Stdlib\ResponseDescription;

class Server implements Dispatchable
{
    protected $events;

    /**
     * Set the event manager instance used by this context
     * 
     * @param  EventCollection $events 
     * @return Server
     */
    public function setEventManager(EventCollection $events)
    {
        $this->events = $events;
        return $this;
    }

    /**
     * Retrieve the event manager
     *
     * Lazy-loads an EventManager instance if none registered.
     * 
     * @return EventCollection
     */
    public function events()
    {
        if (!$this->events instanceof EventCollection) {
            $this->setEventManager(new EventManager(array(
                'Zend\Stdlib\Dispatchable',
                __CLASS__, 
                get_called_class()
            )));
            $this->registerDefaultEvents();
        }
        return $this->events;
    }

    /**
     * Register the default events for this server
     * 
     * @return void
     */
    protected function registerDefaultEvents()
    {
        $events = $this->events();
        $events->attach('dispatch', array($this, 'execute'));
        $result = $this->events()->trigger('dispatch', function($test) {
            return ($test instanceof ResponseDescription);
        });
    }

    public function execute()
    {
        $response = new Response;
        $response->setContent('When I grow up, I want to be a valid JSON-RPC response!');
        return $response;
    }

    public function dispatch(RequestDescription $request, ResponseDescription $response =  null)
    {
        $result = $this->events()->trigger('dispatch');
        if ($result->stopped()) {
            return $result->last();
        }
        return $result->last();
    }
}
