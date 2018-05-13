<?php

class Application_Form_Locataire extends Zend_Form
{

    public function init()
    {
       $this->setName('locataire');
       
       $numeroloc = new Zend_Form_Element_Text('NUMEROLOC');
       $numeroloc->setLabel('Identifiant')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');
       $nom_loc = new Zend_Form_Element_Text('NOM_LOC');
       $nom_loc->setLabel('Nom')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');
       $prenom_loc = new Zend_Form_Element_Text('PRENOM_LOC');
       $prenom_loc->setLabel('Prenom')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');
       $datenaiss = new Zend_Form_Element_Text('DATENAISS');
       $datenaiss->setLabel('Date de naissance (Y-M-D)')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');
       $tel_loc= new Zend_Form_Element_Text('TEL_LOC');
       $tel_loc->setLabel('Tel')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');
       $r_i_b = new Zend_Form_Element_Text('R_I_B');
       $r_i_b->setLabel('RIB (en chiffre)')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');
       $banque = new Zend_Form_Element_Text('BANQUE');
       $banque->setLabel('Banque')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');
       $rue_banque = new Zend_Form_Element_Text('RUE_BANQUE');
       $rue_banque->setLabel('Rue Banque')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');
       $codeville_banque = new Zend_Form_Element_Text('CODEVILLE_BANQUE');
       $codeville_banque->setLabel('Codeville Banque')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');
       $tel_banque = new Zend_Form_Element_Text('TEL_BANQUE');
       $tel_banque->setLabel('Tel_Banque')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');
       $envoyer = new Zend_Form_Element_Submit('envoyer');
       $envoyer->setAttrib('num_cli', 'boutonenvoyer');
       
       $this->addElements(array($numeroloc, $nom_loc, $prenom_loc, $datenaiss, $tel_loc, $r_i_b, $banque, $rue_banque, $codeville_banque, $tel_banque, $envoyer));
    }
    


}

/*NUMEROLOC
    NOM_LOC
    PRENOM_LOC 
    DATENAISS
    TEL_LOC 
    R_I_B
    BANQUE 
    RUE_BANQUE 
    CODEVILLE_BANQUE
    TEL_BANQUE  */ ?>