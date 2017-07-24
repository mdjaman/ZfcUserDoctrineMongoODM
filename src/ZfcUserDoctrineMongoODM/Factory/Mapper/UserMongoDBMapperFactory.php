<?php

namespace ZfcUserDoctrineMongoODM\Factory\Mapper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfcUserDoctrineMongoODM\Mapper\UserMongoDB;

/**
 * Class UserMongoDBMapperFactory
 * @package GoalioForgotPasswordDoctrineMongoODM\Factory\Options
 * @author Marcel Djaman <marceldjaman@gmail.com>
 */
class PasswordMapperFactory implements FactoryInterface
{
    /**
     * Creates an instance of UserMongoDB
     * @param ServiceLocatorInterface $sl
     * @return UserMongoDB
     */
    public function createService(ServiceLocatorInterface $sl)
    {
        $om = $sl->get('goalioforgotpassword_doctrine_dm');
        $moduleOptions = $sl->get('goalioforgotpassword_module_options');
        return new UserMongoDB($om, $moduleOptions);
    }
}