<?php
// module/User/src/User/Controller/IndexController.php:
namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use User\Form\EncodingDataForm;
use User\Model\EncodingData;

class IndexController extends AbstractActionController
{  
    public function indexAction()
    {   
        $form = new EncodingDataForm('encoding');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $encodingData = new EncodingData();
            $form->setInputFilter($encodingData->getInputFilter());
            $form->setData($request->getPost());
            
            
            if ($form->isValid()) {
                print_r($form->getData());
                $encodingData->exchangeArray($form->getData());
                //print_r($form->getData());
                //$this->getAlbumTable()->saveAlbum($album);
                // Redirect to list of albums
                //return $this->redirect()->toRoute('user');
            }
        }
        //permet de fournir une variable et sa valeur à la vue.
        return array('test' => "ok", 'formulaire' => $form);
        // autre méthode pour choisir le layout en fonction de l'action
        //$this->layout('layout/welcome');
    }
    
    public function authAction()
    {
        
    }    
}