<?php

namespace MyApp\Service;

use \Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory for model objects.
 */
class ModelFactory implements \Zend\ServiceManager\AbstractFactoryInterface
{
    private $modelClasses;

    public function __construct()
    {
        $this->modelClasses = array(
            'Bitcoin\Client',
        );
    }
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        return in_array($requestedName, $this->modelClasses);
    }

    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {

        switch ($requestedName) {
            case 'Bitcoin\Client':
                return new \Bitcoin\Client();
            default:
                throw new \Exception("Unknown class: $requestedName");
        }
    }
}