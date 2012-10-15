<?php
namespace User\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class EncodingData implements InputFilterAwareInterface
{
    public $date;
    public $production;    
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->date     = (isset($data['date']))     ? $data['date']     : null;
        $this->production = (isset($data['production'])) ? $data['production'] : null;
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name'     => 'production',
                'required' => true,
                /*'filters'  => array(
                    array('name' => 'Int'),
                ), */
                'validators' => array(
                    array(
                        'name'    => 'Digits',                        
                    ),
                ),       
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name'     => 'date',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 10,
                        ),
                    ),
                ),                
            )));
                       
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
}