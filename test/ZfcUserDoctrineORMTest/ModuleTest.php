<?php

namespace ZfcUserDoctrineTest;

use ZfcUserDoctrine\Module;

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
     * @covers \ZfcUserDoctrine\Module::getConfig
     */
    public function testGetConfig()
    {
        $this->assertEquals(
            include __DIR__ . '/../../config/module.config.php',
            $this->module->getConfig()
        );
    }

    /**
     * @covers \ZfcUserDoctrine\Module::getAutoloaderConfig
     */
    public function testGetAutoloaderConfig()
    {
        $expected = array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    'ZfcUserDoctrine' => realpath(__DIR__ . '/../../src/ZfcUserDoctrine')
                )
            )
        );

        $this->assertEquals($expected, $this->module->getAutoloaderConfig());
    }
}
