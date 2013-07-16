<?php

namespace ZfcUserDoctrineORMTest\Asset;

use Zend\ServiceManager\ServiceLocatorInterface;
use ZfcUserDoctrineORM\Plugin\AbstractPluginFactory;

class PluginFactory extends AbstractPluginFactory
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this->getObjectManager($serviceLocator);
    }
}
