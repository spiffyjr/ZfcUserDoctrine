<?php

namespace ZfcUserDoctrine\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

abstract class AbstractServiceFactory implements FactoryInterface
{
    protected function getObjectManager(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \ZfcUserDoctrine\ModuleOptions $options */
        $options = $serviceLocator->get('ZfcUserDoctrine\ModuleOptions');

        return $serviceLocator->get($options->getObjectManagerService());
    }
}