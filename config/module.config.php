<?php

return array(
    'doctrine' => array(
        'authentication' => array(
            'orm_default' => array(
                'object_manager'      => 'Doctrine\ORM\EntityManager',
                'identity_class'      => 'ZfcUserDoctrine\Entity\User',
                'identity_property'   => 'email',
                'credential_property' => 'password'
            )
        ),

        'driver' => array(
            'zfc_user_doctrine_orm' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\XmlDriver',
                'paths' => array(__DIR__ . '/orm')
            ),

            'orm_default' => array(
                'drivers' => array(
                    'ZfcUserDoctrine\Entity' => 'zfc_user_doctrine_orm',
                )
            )
        )
    ),

    'service_manager' => include 'service.config.php',

    'zfc_user' => array(
        'extensions' => array(
            'doctrine' => 'ZfcUserDoctrine\Extension',

            'user' => array(
                'options' => array(
                    'entity_class' => 'ZfcUserDoctrine\Entity\User'
                )
            )
        ),
    ),

    'zfc_user_doctrine_orm' => array(
        'adapter_service'        => 'doctrine.authenticationadapter.orm_default',
        'object_manager_service' => 'Doctrine\ORM\EntityManager'
    ),
);
