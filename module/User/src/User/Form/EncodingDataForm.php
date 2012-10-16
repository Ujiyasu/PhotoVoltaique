<?php
namespace User\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class EncodingDataForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct();
        $this->setAttribute('method', 'post');
        $this->setName($name);
        
        $date = new Element('date');
        $date->setLabel('Selectionnez la date pour l\'encodage')
                ->setAttributes(array('type' => 'text', 'id' => 'date', 'readonly' => 'readonly'));
        
        $production = new Element('production');
        $production->setLabel('Encodez votre production')
                ->setAttributes(array('type' => 'text', 'id' => 'production'))
                ->setValue(null);
        
        $submit = new Element('save');
        $submit->setValue('Enregistrer')
                ->setAttributes(array('type' => 'submit', 'id' => 'save'));
        
        $this->add($date);
        $this->add($production);
        $this->add($submit); 
    }       
}