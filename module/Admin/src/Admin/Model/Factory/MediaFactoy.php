<?php

namespace Admin\Model\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use \Admin\Model\Media;

class MediaFactoy implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {

        $em                 = $serviceLocator->get('Doctrine\ORM\EntityManager');

        $model = new Media(
            $em
        );

        return $model;

    }
}
