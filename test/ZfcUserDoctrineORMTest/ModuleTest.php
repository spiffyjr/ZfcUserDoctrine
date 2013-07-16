<?php

namespace ZfcUserDoctrineORMTest;

use ZfcUserDoctrineORM\Module;

class ModuleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Module
     */
    protected $module;

    public function setUp()
    {
        $this->module = new Module();
    }

    /**
     * @covers \ZfcUserDoctrineORM\Module::getConfig
     */
    public function testGetConfig()
    {
        $this->assertEquals(
            include __DIR__ . '/../../config/module.config.php',
            $this->module->getConfig()
        );
    }

    /**
     * @covers \ZfcUserDoctrineORM\Module::getAutoloaderConfig
     */
    public function testGetAutoloaderConfig()
    {
        $expected = array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    'ZfcUserDoctrineORM' => realpath(__DIR__ . '/../../src/ZfcUserDoctrineORM')
                )
            )
        );

        $this->assertEquals($expected, $this->module->getAutoloaderConfig());
    }
}
