<?php

namespace Admin\Factory ;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface ;
use \Admin\Controller\AdminController;

class AdminControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $em                 = $realServiceLocator->get('Doctrine\ORM\EntityManager');
        $creationModel      = $realServiceLocator->get('Creation');

        return new AdminController(
            $em,
            $creationModel
        );
    }
}
