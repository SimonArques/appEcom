<?php

class Application_Form_Product extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setMethod('post');

        $this->addElement('hidden', 'id', array());

        $this->addElement('text', 'productName', array(
            'label'      => 'Nom du produit: ',
            'required'   => true,
            'filters'    => array('StringTrim'),
            )
        );

        $this->addElement('text', 'price', array(
                'label'      => 'Prix: ',
                'required'   => true,
            )
        );

        $this->addElement('textarea', 'desc', array(
            'label'      => 'Description du produit: ',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 200)
                )
            )
        ));

        $this->addElement('text', 'quantity', array(
                'label'     => 'Quantité: ',
                'required'  => true,
        ));

        $this->addElement('text', 'category', array(
                'label'     => 'Catégorie: ',
                'required'  => true,
        ));

        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Sauvegarder',
        ));
    }


}

