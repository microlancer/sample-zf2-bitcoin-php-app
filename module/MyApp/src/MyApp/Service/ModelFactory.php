<?php

namespace MyApp\Service;

use \Zend\ServiceManager\ServiceLocatorInterface;
use \Bitcoin\BitcoinClient;

/**
 * Service factory for model objects.
 */
class ModelFactory implements \Zend\ServiceManager\AbstractFactoryInterface
{
    private $modelClasses;

    public function __construct()
    {
        $this->modelClasses = array(
            'Bitcoin\BitcoinClient',
        );
    }
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        return in_array($requestedName, $this->modelClasses);
    }

    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {

        switch ($requestedName) {
            case 'Bitcoin\BitcoinClient':
                $config = $serviceLocator->get('Config');
                if (!isset($config['bitcoin'])) {
                    throw new \Exception('Please be sure you have set your bitcoin server configuration in the config/autoload/local.php file.');
                }
                return new BitcoinClient(
                    $config['bitcoin']['scheme'],
                    $config['bitcoin']['username'],
                    $config['bitcoin']['password'],
                    $config['bitcoin']['address'],
                    $config['bitcoin']['port']
                );
            default:
                throw new \Exception("Unknown class: $requestedName");
        }
    }
}