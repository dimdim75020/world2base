<?php

class Application_Form_Proprietaire extends Zend_Form {

    public function init() {

        $this->setName('locataire');

        $numeroprop = new Zend_Form_Element_Text('NUMEROPROP');
        $numeroprop->setLabel('Identifiant')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $nom = new Zend_Form_Element_Text('NOM');
        $nom->setLabel('Nom')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $prenom = new Zend_Form_Element_Text('PRENOM');
        $prenom->setLabel('Prenom')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $adresse = new Zend_Form_Element_Text('ADRESSE');
        $adresse->setLabel('Adresse')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $code_ville = new Zend_Form_Element_Text('CODE_VILLE');
        $code_ville->setLabel('Codeville')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $tel = new Zend_Form_Element_Text('TEL');
        $tel->setLabel('Tel')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $envoyer = new Zend_Form_Element_Submit('envoyer');
        $envoyer->setAttrib('num', 'boutonenvoyer');

        $this->addElements(array($numeroprop, $nom, $prenom, $adresse, $code_ville, $tel, $envoyer));
    }

}
