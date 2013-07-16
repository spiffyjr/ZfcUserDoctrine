<?php

namespace ZfcUserDoctrineORM\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

abstract class AbstractServiceFactory implements FactoryInterface
{
    protected function getObjectManager(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \ZfcUserDoctrineORM\ModuleOptions $options */
        $options = $serviceLocator->get('ZfcUserDoctrineORM\ModuleOptions');

        return $serviceLocator->get($options->getObjectManagerService());
    }
}