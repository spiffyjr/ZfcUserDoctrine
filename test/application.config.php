<?php

return array(
    'modules' => array(
        'SpiffyTest',
        'DoctrineModule',
        'DoctrineORMModule',
        'ZfcUser',
        'ZfcUserRemember',
        'ZfcUserDoctrineORM'
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            '../../../config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            'module',
            'vendor',
        ),
    ),
);
