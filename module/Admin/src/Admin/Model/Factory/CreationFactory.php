<?php

namespace Admin\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use \Admin\Model\Creation;

class CreationFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {

        $em                 = $serviceLocator->get('Doctrine\ORM\EntityManager');

        $model = new Creation(
            $em
        );

        return $model;

    }
}
