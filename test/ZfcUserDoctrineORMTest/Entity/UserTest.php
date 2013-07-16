<?php

namespace ZfcUserDoctrineTest\Entity;

use DateTime;
use ZfcUserDoctrine\Entity\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \ZfcUserDoctrine\Entity\User
     * @dataProvider optionsProvider
     */
    public function testOptions($key, $value)
    {
        $setter  = 'set' . ucfirst($key);
        $getter  = 'get' . ucfirst($key);

        $options = new User();
        $result  = $options->$setter($value)
            ->$getter($value);

        $this->assertEquals($value, $result);
    }

    public function optionsProvider()
    {
        return array(
            array('id', 1),
            array('identity', 'string'),
            array('credential', 'string'),
        );
    }
}
