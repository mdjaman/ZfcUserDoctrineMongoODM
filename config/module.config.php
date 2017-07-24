<?php

namespace ZfcUserDoctrineMongoODM;

return array(
    'service_manager' => array(
        'aliases' => array(
            'zfcuser_doctrine_dm' => 'doctrine.documentmanager.odm_default',

        ),
        'factories' => array(
            'zfcuser_module_options' => Factory\Options\ModuleOptionsFactory::class,
            'zfcuser_user_mapper' => Factory\Mapper\PasswordMapperFactory::class,
        ),
    ),

    'doctrine' => array(
        'driver' => array(
            'zfcuser_document' => array(
                'class' => 'Doctrine\ODM\MongoDB\Mapping\Driver\XmlDriver',
                'paths' => __DIR__ . '/xml'
            ),

            'odm_default' => array(
                'drivers' => array(
                    'ZfcUserDoctrineMongoODM\Document'  => 'zfcuser_document'
                )
            )
        )
    ),
);