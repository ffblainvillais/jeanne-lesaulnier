<?php
namespace Admin\Controller;

use Admin\Form\AddCreationForm;
use Admin\Model\Creation;
use Admin\Model\Media;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    protected $em;
    protected $creationModel;
    protected $mediaModel;

    public function __construct($em, Creation $creationModel, Media $mediaModel)
    {
        $this->em                   = $em;
        $this->creationModel        = $creationModel;
        $this->mediaModel           = $mediaModel;
    }

    public function addPageAction()
    {
        $form = new AddCreationForm();

        $form->setAttribute('action', $this->url()->fromRoute('add-creation'));

        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        $viewModel->setTemplate('admin/index/add-creation-form');
        $viewModel->setVariables(array(
            'form' => $form,
        ));

        return $viewModel;
    }

    public function addAction()
    {
        $request    = $this->getRequest();
        $fromPost   = $this->params()->fromPost();

        if ($request->isPost()) {

            $files  = $request->getFiles()->toArray();
            $this->mediaModel->saveFiles($files);

            $creation = $this->creationModel->addCreation($fromPost['title'], $files['logo']['name']);

            $this->em->persist($creation);
            $this->em->flush();

        }

        $this->flashMessenger()->addMessage('La réalisations à été crée avec succes !');

        return $this->redirect()->toRoute('home');
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
