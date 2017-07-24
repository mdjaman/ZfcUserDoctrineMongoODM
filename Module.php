<?php

namespace ZfcUserDoctrineMongoODM;

use Doctrine\ODM\MongoDB\Mapping\Driver\XmlDriver;
use ZfcUser\Module as ZfcUser;

class Module
{
    /**
     * @param $e
     */
    public function onBootstrap($e)
    {
        $app     = $e->getParam('application');
        $sm      = $app->getServiceManager();
        $options = $sm->get('zfcuser_module_options');

        // Add the default entity driver only if specified in configuration
        if ($options->getEnableDefaultEntities()) {
            $chain = $sm->get('doctrine.driver.odm_default');
            $chain->addDriver(new XmlDriver(__DIR__ . '/config/xml'), 'ZfcUserDoctrineMongoODM\Document');
        }
    }

    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}
