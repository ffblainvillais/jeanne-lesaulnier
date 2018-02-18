<?php

namespace Application\View\Helper\Factory;

use Application\View\Helper\Creation;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CreationFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {

        $realServiceLocator = $serviceLocator->getServiceLocator();

        $em         = $realServiceLocator->get('Doctrine\ORM\EntityManager');
        $mediaModel = $realServiceLocator->get('Media');

        $viewHelper = new Creation(
            $em,
            $mediaModel
        );

        return $viewHelper;

    }
}
