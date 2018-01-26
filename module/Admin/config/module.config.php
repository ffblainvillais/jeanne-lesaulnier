<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Admin;

use Admin\Factory\AdminControllerFactory;
use Admin\Factory\CreationFactory;

return array(
    'router' => array(
        'router_class' => 'Zend\Mvc\Router\Http\TranslatorAwareTreeRouteStack',
        'routes' => array(
            'add-creation-page' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/add-creation-page',
                    'defaults' => [
                        '__NAMESPACE__' => 'Admin\Controller',
                        'controller'    => 'Admin',
                        'action'        => 'addPage',
                    ],
                ],
            ],
            'add-creation' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/add-creation',
                    'defaults' => [
                        '__NAMESPACE__' => 'Admin\Controller',
                        'controller'    => 'Admin',
                        'action'        => 'add',
                    ],
                ],
            ],
            'remove-creation' => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '/remove-creation/:idCreation',
                    'constraints' => [
                        'idCreation' => '[0-9]*',
                    ],
                    'defaults' => [
                        'action'        => 'remove',
                    ],
                ],
            ],
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Creation' => CreationFactory::class
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Admin\Controller\Admin' => AdminControllerFactory::class,
        )
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        ),
    ),
);
