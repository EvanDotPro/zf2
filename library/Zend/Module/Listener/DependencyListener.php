<?php

namespace Zend\Module\Listener;

use Zend\Module\ModuleEvent;

class DependencyListener extends AbstractListener
{

    protected $eventIsAttached = false;

    public function __invoke(ModuleEvent $e)
    {
        $this->attachEvent($e);
    }

    protected function attachEvent(ModuleEvent $e)
    {
        if ($this->eventIsAttached) {
            return;
        }
        $moduleManager = $e->getTarget();
        $moduleManager->events()->attach('init.post', array($this, 'initPost'));
        $this->eventIsAttached = true;
    }

    public function initPost($e)
    {
        $moduleManager = $e->getTarget();
        // check dependencies here
    }
}
