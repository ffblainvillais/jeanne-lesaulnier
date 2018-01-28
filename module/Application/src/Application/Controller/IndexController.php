<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Admin\Entity\Creation;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    protected $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function indexAction()
    {
        $viewModel = new ViewModel();
        $creations = $this->em->getRepository(Creation::class)->findAll();

        $viewModel->setVariables(array(
            'creations' => $creations,
            'mainPage'  => true
        ));

        return $viewModel;
    }
}
