<?php

return array(
    'factories' => array(
        'Zend\Authentication\AuthenticationService' => 'ZfcUserDoctrine\Authentication\AuthenticationServiceFactory',

        'ZfcUserDoctrine\Extension'     => 'ZfcUserDoctrine\ExtensionFactory',
        'ZfcUserDoctrine\ModuleOptions' => 'ZfcUserDoctrine\ModuleOptionsFactory',
    )
);
