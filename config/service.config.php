<?php

return array(
    'factories' => array(
        'Zend\Authentication\AuthenticationService' => 'ZfcUserDoctrineORM\Authentication\AuthenticationServiceFactory',

        'ZfcUserDoctrineORM\Extension'     => 'ZfcUserDoctrineORM\ExtensionFactory',
        'ZfcUserDoctrineORM\ModuleOptions' => 'ZfcUserDoctrineORM\ModuleOptionsFactory',
    )
);
