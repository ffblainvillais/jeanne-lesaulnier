<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController
{

    protected $em;
    protected $creationModel;

    public function __construct($em, $creationModel)
    {
        $this->em                   = $em;
        $this->creationModel        = $creationModel;
    }

    public function addPageAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('/admin/add-creation-form');

        return $viewModel;
    }

    public function addAction()
    {
        $title   = trim($this->params()->fromPost('title'));

        $user    = $this->identity->getUser();

        $message = $this->shoppingListModel->addShoppingList($title, $user, ShoppingList::USER_TYPE);

        $this->flashMessenger()->addMessage($message);

        return $this->redirect()->toRoute('user', ['controller' => 'shoppingList']);
    }

    public function deleteAction()
    {

        $shoppingListId  = $this->params()->fromRoute('shoppingListId');

        $message = $this->shoppingListModel->deleteShoppingListById($shoppingListId);

        $this->flashMessenger()->addMessage($message);

        return $this->redirect()->toRoute('user', ['controller' => 'shoppingList']);
    }

    public function preDispatch (MvcEvent $e)
    {
        if (!$this->identity->isConnected()) {
            return $this->_redirectToConnection();
        }
    }

    private function _redirectToConnection()
    {
        return $this->redirect()->toRoute( 'user', [
            'controller' => 'connection',
            'action'     => 'index',
        ]);
    }
}
