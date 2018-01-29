<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Admin;


use Admin\Controller\Factory\IndexControllerFactory;
use Admin\Model\Factory\CreationFactory;
use Admin\Model\Factory\MediaFactoy;


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
                    'route'    => '/remove-creation/:creationId',
                    'constraints' => [
                        'creationId' => '[0-9]*',
                    ],
                    'defaults' => [
                        '__NAMESPACE__' => 'Admin\Controller',
                        'controller'    => 'Admin',
                        'action'        => 'remove',
                    ],
                ],
            ],
            'detail-creation-page' => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '/realisation/:creationId',
                    'constraints' => [
                        'creationId' => '[0-9]*',
                    ],
                    'defaults' => [
                        '__NAMESPACE__' => 'Admin\Controller',
                        'controller'    => 'Admin',
                        'action'        => 'detailCreationPage',
                    ],
                ],
            ],
            'add-media-creation' => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '/add-media-realisation/:creationId',
                    'constraints' => [
                        'creationId' => '[0-9]*',
                    ],
                    'defaults' => [
                        '__NAMESPACE__' => 'Admin\Controller',
                        'controller'    => 'Admin',
                        'action'        => 'addMediaPage',
                    ],
                ],
            ],
            'add-media' => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '/add-media/:creationId',
                    'constraints' => [
                        'creationId' => '[0-9]*',
                    ],
                    'defaults' => [
                        '__NAMESPACE__' => 'Admin\Controller',
                        'controller'    => 'Admin',
                        'action'        => 'addMedia',
                    ],
                ],
            ],
            'remove-media-creation' => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '/remove-media/:creationId/:mediaId',
                    'constraints' => [
                        'creationId'    => '[0-9]*',
                        'mediaId'       => '[0-9]*',
                    ],
                    'defaults' => [
                        '__NAMESPACE__' => 'Admin\Controller',
                        'controller'    => 'Admin',
                        'action'        => 'removeMedia',
                    ],
                ],
            ],
            'download-cv' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/download-cv',
                    'defaults' => [
                        '__NAMESPACE__' => 'Admin\Controller',
                        'controller'    => 'Admin',
                        'action'        => 'downloadCv',
                    ],
                ],
            ],
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Creation'  => CreationFactory::class,
            'Media'     => MediaFactoy::class
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Admin\Controller\Admin' => IndexControllerFactory::class,
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
    'view_manager' => array(
        /*'template_map' => array(
            'admin/index/add-creation-page' => __DIR__ . '/../view/cart/cart/index.twig',
        ),*/
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
