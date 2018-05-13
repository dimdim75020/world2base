<?php

class Application_Form_Visite extends Zend_Form {

    public function init() {

        $this->setName('visite');

        $num_cli = new Zend_Form_Element_Select('NUM_CLI');
        $num_cli->setLabel('Identifiant visiteur')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $numappart = new Zend_Form_Element_Select('NUMAPPART');
        $numappart->setLabel('Id appart')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $date_visite = new Zend_Form_Element_Text('DATE_VISITE');
        $date_visite->setLabel('date de la visite (Y-M-D)')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $envoyer = new Zend_Form_Element_Submit('envoyer');
        $envoyer->setAttrib('num_cli', 'boutonenvoyer');

        //alimente liste deroulante id client
        $yiencli = new Application_Model_DbTable_Client();
        $rinte = $yiencli->fetchAll();
        foreach ($rinte as $unYiencli) {
                $num_cli->addMultiOptions(array($unYiencli->NUM_CLI => $unYiencli->NUM_CLI));
        }
        
        //alimente liste deroulante id appart
        $tum = new Application_Model_DbTable_Appartement();
        $baraque = $tum->fetchAll();
        foreach ($baraque as $tum) {
                $numappart->addMultiOptions(array($tum->NUMAPPART =>$tum->NUMAPPART));
        }
        
       
        
    
        $this->addElements(array($num_cli, $numappart, $date_visite, $envoyer));
    }

}


