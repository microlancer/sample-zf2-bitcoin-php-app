<?php

namespace MyApp;

use \MyApp\Controller\IndexController;
use \Zend\Mvc\MvcEvent;

class Module
{
    /**
     * @var \Zend\ServiceManager\ServiceManager
     */
    private $serviceManager;

    public function onBootstrap(MvcEvent $e)
    {
        $this->serviceManager = $e->getApplication()->getServiceManager();
        $this->serviceManager->addAbstractFactory(new \MyApp\Service\ModelFactory());
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}