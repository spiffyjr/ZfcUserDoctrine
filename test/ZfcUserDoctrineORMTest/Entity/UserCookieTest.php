<?php

namespace ZfcUserDoctrineORMTest\Entity;

use ZfcUserDoctrineORM\Entity\User;
use ZfcUserDoctrineORM\Entity\UserCookie;

class UserCookieTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \ZfcUserDoctrineORM\Entity\UserCookie
     * @dataProvider optionsProvider
     */
    public function testOptions($key, $value)
    {
        $setter  = 'set' . ucfirst($key);
        $getter  = 'get' . ucfirst($key);

        $options = new UserCookie();
        $result  = $options->$setter($value)
            ->$getter($value);

        $this->assertEquals($value, $result);
    }

    public function optionsProvider()
    {
        return array(
            array('id', 1),
            array('user', new User()),
            array('token', 'string'),
        );
    }
}
