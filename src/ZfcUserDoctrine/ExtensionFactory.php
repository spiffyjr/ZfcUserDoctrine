<?php

namespace ZfcUserDoctrine;

use Zend\ServiceManager\ServiceLocatorInterface;
use ZfcUserDoctrine\Service\AbstractServiceFactory;

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
        /** @var \ZfcUserDoctrine\ModuleOptions $options */
        $options = $serviceLocator->get('ZfcUserDoctrine\ModuleOptions');
        $adapter = $serviceLocator->get($options->getAdapterService());

        return new Extension($adapter, $this->getObjectManager($serviceLocator));
    }
}