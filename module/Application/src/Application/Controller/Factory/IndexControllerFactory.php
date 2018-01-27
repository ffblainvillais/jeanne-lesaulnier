<?php

namespace Application\Controller\Factory ;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface ;
use \Application\Controller\IndexController;

class IndexControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $em                 = $realServiceLocator->get('Doctrine\ORM\EntityManager');

        return new IndexController(
            $em
        );
    }
}
