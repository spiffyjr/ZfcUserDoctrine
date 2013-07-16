<?php

namespace ZfcUserDoctrineTest\Options;

use ZfcUserDoctrine\ModuleOptions;

class ModuleOptionsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider optionsProvider
     */
    public function testOptions($key, $value)
    {
        $setter  = 'set' . ucfirst($key);
        $getter  = 'get' . ucfirst($key);

        $options = new ModuleOptions();
        $result  = $options->$setter($value)
                           ->$getter($value);

        $this->assertEquals($value, $result);
    }

    public function optionsProvider()
    {
        return array(
            array('adapter', 'string'),
            array('objectManager', 'string'),
        );
    }
}
