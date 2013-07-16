<?php

namespace ZfcUserDoctrineORM;

use Zend\ServiceManager\ServiceLocatorInterface;
use ZfcUserDoctrineORM\Service\AbstractServiceFactory;

class ExtensionFactory extends AbstractServiceFactory
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return Extension
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \ZfcUserDoctrineORM\ModuleOptions $options */
        $options = $serviceLocator->get('ZfcUserDoctrineORM\ModuleOptions');
        $adapter = $serviceLocator->get($options->getAdapterService());

        return new Extension($adapter, $this->getObjectManager($serviceLocator));
    }
}