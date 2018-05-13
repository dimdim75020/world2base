<?php

class Application_Form_Client extends Zend_Form
{

    public function init()
    {
       $this->setName('client');
       
       $num_cli = new Zend_Form_Element_Text('NUM_CLI');
       $num_cli->setLabel('Identifiant')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');
       $nom_cli = new Zend_Form_Element_Text('NOM_CLI');
       $nom_cli->setLabel('Nom')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');
       $prenom_cli = new Zend_Form_Element_Text('PRENOM_CLI');
       $prenom_cli->setLabel('Prenom')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');
       $adresse_cli = new Zend_Form_Element_Text('ADRESSE_CLI');
       $adresse_cli->setLabel('Adresse')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');
       $codeville_cli = new Zend_Form_Element_Text('CODEVILLE_CLI');
       $codeville_cli->setLabel('Codeville')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');
       $tel_cli = new Zend_Form_Element_Text('TEL_CLI');
       $tel_cli->setLabel('Tel')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');
       $envoyer = new Zend_Form_Element_Submit('envoyer');
       $envoyer->setAttrib('num_cli', 'boutonenvoyer');
       
       $this->addElements(array($num_cli, $nom_cli, $prenom_cli, $adresse_cli, $codeville_cli, $tel_cli, $envoyer));
    }


}

