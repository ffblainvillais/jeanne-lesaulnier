<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Creation extends AbstractHelper implements ServiceLocatorAwareInterface
{
    protected $em;
    protected $serviceLocator;

    const PATH_TO_READ_FILE = 'images/upload/creations/';

    public function getImagePath($imageName)
    {
        return self::PATH_TO_READ_FILE.$imageName;
    }

    public function getAbsoluteImagePath($imageName)
    {
        return $_SERVER['HTTP_HOST'].'/'.self::PATH_TO_READ_FILE.$imageName;
    }

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    public function getServiceLocator()
    {
        return $this->serviceLocator->getServiceLocator();
    }

    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->serviceLocator
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }

    public function __invoke()
    {
        return $this;
    }
}
