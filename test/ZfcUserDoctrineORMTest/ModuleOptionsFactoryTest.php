<?php

namespace ZfcUserDoctrineORMTest\Options;

use Zend\ServiceManager\ServiceManager;
use ZfcUserDoctrineORM\ModuleOptionsFactory;

class ModuleOptionsFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @cover \ZfcUser\ModuleOptionsFactory::createService
     */
    public function testCreateService()
    {
        $factory = new ModuleOptionsFactory();
        $sm      = new ServiceManager();

        $sm->setService('Configuration', array());
        $sm->setAllowOverride(true);

        $this->assertInstanceOf('ZfcUserDoctrineORM\ModuleOptions', $factory->createService($sm));

        $sm->setService(
            'Configuration',
            array(
                'zfc_user_doctrine_orm' => array(
                    'object_manager' => 'foo\bar'
                )
            )
        );

        $options = $factory->createService($sm);

        $this->assertInstanceOf('ZfcUserDoctrineORM\ModuleOptions', $options);
        $this->assertEquals('foo\bar', $options->getObjectManager());
    }
}