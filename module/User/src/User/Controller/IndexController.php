<?php
// module/User/src/User/Controller/IndexController.php:
namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{  
    public function indexAction()
    {   
        //permet de fournir une variable et sa valeur à la vue.
        return array('test' => "ok");
        // autre méthode pour choisir le layout en fonction de l'action
        //$this->layout('layout/welcome');
    }
    
    public function authAction()
    {
        
    }    
}