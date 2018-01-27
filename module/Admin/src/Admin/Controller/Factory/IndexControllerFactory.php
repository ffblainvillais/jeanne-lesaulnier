<?php

namespace Admin\Controller\Factory ;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface ;
use \Admin\Controller\IndexController;

class IndexControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $em                 = $realServiceLocator->get('Doctrine\ORM\EntityManager');
        $creationModel      = $realServiceLocator->get('Creation');
        $mediaModel         = $realServiceLocator->get('Media');

        return new IndexController(
            $em,
            $creationModel,
            $mediaModel
        );
    }
}
