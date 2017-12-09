<?php

namespace Application\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use \Application\Model\Identity;

class IdentityFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $em                     = $serviceLocator->get('Doctrine\ORM\EntityManager');
        $authenticationService  = $serviceLocator->get('Zend\Authentication\AuthenticationService');        $barcodeModel       = $serviceLocator->get('Barcode');

        $model = new Identity(
            $em,
            $authenticationService
        );

        return $model;

    }
}
