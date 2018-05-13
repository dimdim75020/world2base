<?php

class Application_Form_Demande extends Zend_Form {

    public function init() {
        $this->setName('demande');

        $num_dem = new Zend_Form_Element_Text('NUM_DEM');
        $num_dem->setLabel('Id demande')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $num_cli = new Zend_Form_Element_Select('NUM_CLI');
        $num_cli->setLabel('Id client')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $type_dem = new Zend_Form_Element_Select('TYPE_DEM');
        $type_dem->setLabel('type demande')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $date_limite = new Zend_Form_Element_Text('DATE_LIMITE');
        $date_limite->setLabel('date limite (Y-M-D)')
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
        // alimente liste deroulante type appart
        $type_dem->addMultiOptions(array("F1" => "F1", "F2"=> "F2", "F3" => "F3" , "F4" => "F4" , "F5" => "F5" , "STUDIO" =>"STUDIO"));
    


    $this->addElements(array($num_dem, $num_cli, $type_dem, $date_limite, $envoyer));
}
}