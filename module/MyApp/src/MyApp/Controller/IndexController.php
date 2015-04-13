<?php

namespace MyApp\Controller;

use \Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $client = $this->getServiceLocator()->create('Bitcoin\Client');
        
    }
}