<?php

namespace Zend\Module\Listener;

use Zend\Module\ModuleEvent,
    Zend\Module\Consumer\Depends,
    Zend\Module\Consumer\Provides,
    Zend\Module\Listener\DependencyListener\Provision,
    Zend\Module\Listener\DependencyListener\Dependency,
    Zend\Module\Listener\Exception\RuntimeException,
    Zend\Module\Listener\Exception\InvalidArgumentException,
    Zend\Version as ZfVersion;

class DependencyListener extends AbstractListener
{

    /**
     * eventIsAttached 
     * 
     * @var bool
     */
    protected $eventIsAttached = false;

    /**
     * provisions 
     * 
     * @var array
     */
    protected $provisions = array();

    /**
     * dependencies 
     * 
     * @var array
     */
    protected $dependencies = array();

    /**
     * regex for getting version operators
     *
     * @var string
     */
    protected $operators = '/(<|lt|<=|le|>|gt|>=|ge|==|=|eq|!=|<>|ne)?(\d.*)/';

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
        $this->addSystemProvisions();
        foreach ($moduleManager->getLoadedModules() as $moduleName => $module) {
            if ($module instanceof Provides) {
                foreach ($module->getProvides() as $provisionName => $version) {
                    $provision = strtolower($provisionName);
                    if (isset($this->provisions[$provision])) {
                        throw new RuntimeException(sprintf(
                            'Duplicate provision error: %s',
                        $provision));
                    }
                    $this->provisions[$provision] = new Provision($provisionName, $version);
                    $this->provisions[$provision]->setProvider($module);
                }
            }
            if ($module instanceof Depends) {
                foreach ($module->getDependencies() as $dependencyName => $version) {
                    $dependency = strtolower($dependencyName);
                    if (!isset($this->dependencies[$dependency])) {
                        $this->dependencies[$dependency] = new Dependency($dependencyName);
                    }
                    $this->dependencies[$dependency]->addDependant($module, $version);
                }
            }
        }
        $unsatisfied = array_diff_key($this->dependencies, $this->provisions);
        // check dependencies
    }

    protected function addSystemProvisions()
    {
        if (isset($this->provisions['php'])) {
            return $this;
        }
        $this->provisions['php'] = new Provision('php', PHP_VERSION);
        foreach (get_loaded_extensions() as $phpExtension) {
            $version = phpversion($phpExtension);
            $provisionName = 'ext/' . $phpExtension;
            $this->provisions[$provisionName] = new Provision($provisionName, $version);
        }
        $this->provisions['zf'] = new Provision('zf', ZfVersion::VERSION);
        return $this;
    }
}
