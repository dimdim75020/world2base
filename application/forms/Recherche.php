<?php

class Application_Form_Recherche extends Zend_Form {

    public function init() {
        $this->setName('Appartements');

//        $arrondissement = new Zend_Form_Element_Text('ARRONDISSEMENT');
//        $arrondissement->setLabel('arrondissement')
//                ->addFilter('StripTags')
//                ->addFilter('StringTrim')
//        ;

        $arrondissement = new Zend_Form_Element_Select('ARRONDISSEMENT');
        $arrondissement->setLabel('Arrondissement')
                ->addFilter('StripTags')
                ->addFilter('StringTrim');
        $arrondissement->setMultiOptions(array(
            '' => '-',
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            '10' => '10',
            '11' => '11',
            '12' => '12',
            '13' => '13',
            '14' => '14',
            '15' => '15',
            '16' => '16',
            '17' => '17',
            '18' => '18',
            '19' => '19',
            '20' => '20',
            '21' => '21',
            '22' => '22',
            '23' => '23',
            '24' => '24'
        )); // les options à afficher dans le select

        $typappart = new Zend_Form_Element_Select('TYPAPPART');
        $typappart->setLabel('Type appart');
        $typappart->setMultiOptions(array(
            '' => '-',
            'STUDIO' => 'STUDIO',
            'F1' => 'F1',
            'F2' => 'F2',
            'F3' => 'F3',
            'F4' => 'F4',
            'F5' => 'F5'
        ));

        $loyermin = new Zend_Form_Element_Text('LOYERMIN');
        $loyermin->setLabel('Loyer Min')
                ->addFilter('StripTags')
                ->addFilter('StringTrim');


        $loyermax = new Zend_Form_Element_Text('LOYERMAX');
        $loyermax->setLabel('Loyer Max')
                ->addFilter('StripTags')
                ->addFilter('StringTrim');


        $envoyer = new Zend_Form_Element_Submit('envoyer');
        $this->addElements(array($arrondissement, $typappart, $loyermin, $loyermax, $envoyer));
    }

}
