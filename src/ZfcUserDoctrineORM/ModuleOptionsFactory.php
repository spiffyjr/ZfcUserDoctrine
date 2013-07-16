<?php

namespace ZfcUserDoctrineORM;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ModuleOptionsFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return ModuleOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config  = $serviceLocator->get('Configuration');
        $config  = isset($config['zfc_user_doctrine_orm']) ? $config['zfc_user_doctrine_orm'] : array();

        return new ModuleOptions($config);
    }
}
