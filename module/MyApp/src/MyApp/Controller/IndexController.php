<?php

namespace MyApp\Controller;

use \Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    /**
     * @var \Bitcoin\BitcoinClient
     */
    private $client;

    public function indexAction()
    {
        // Create an instance of the Bitcoin-PHP Library Bitcoin Client

        $this->client = $this->getServiceLocator()->create('Bitcoin\BitcoinClient');

        $viewVars = array();

        // Example usage: check if the client can connect

        $viewVars['can_connect'] = $this->client->can_connect();

        // Example usage: retrieve a list of bitcoin server commands

        $viewVars['help'] = $this->client->help();

        // Render output via file at module/MyApp/view/my-app/index/index.phtml

        $view = new \Zend\View\Model\ViewModel($viewVars);
        return $view;
    }
}