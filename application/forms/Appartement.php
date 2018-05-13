<?php

class Application_Form_Appartement extends Zend_Form {

    public function init() {
        $this->setName('appartement');

        $numappart = new Zend_Form_Element_Text('NUMAPPART');
        $numappart->setLabel('Id appart')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $typappart = new Zend_Form_Element_Select('TYPAPPART');
        $typappart->setLabel('Type appart')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $prix_loc = new Zend_Form_Element_Text('PRIX_LOC');
        $prix_loc->setLabel('Prix loc')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $prix_charg = new Zend_Form_Element_Text('PRIX_CHARG');
        $prix_charg->setLabel('Prix charg')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $rue = new Zend_Form_Element_Text('RUE');
        $rue->setLabel('rue')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $arrondissement = new Zend_Form_Element_Select('ARRONDISSEMENT');
        $arrondissement->setLabel('arrondissement')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $etage = new Zend_Form_Element_Text('ETAGE');
        $etage->setLabel('etage')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $ascenseur = new Zend_Form_Element_Select('ASCENSEUR');
        $ascenseur->setLabel('ascenseur (0 ou 1)')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $preavis = new Zend_Form_Element_Select('PREAVIS');
        $preavis->setLabel('Preavis (0 ou 1)')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $date_libre = new Zend_Form_Element_Text('DATE_LIBRE');
        $date_libre->setLabel('date libre (Y-M-D)')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $numeroprop = new Zend_Form_Element_Select('NUMEROPROP');
        $numeroprop->setLabel('Id proprio')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $numeroloc = new Zend_Form_Element_Select('NUMEROLOC');
        $numeroloc->setLabel('id locataire')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $envoyer = new Zend_Form_Element_Submit('envoyer');
        $envoyer->setAttrib('num_cli', 'boutonenvoyer');

        // alimente la liste deroulante type appart
        $type = new Application_Model_DbTable_Appartement();
        $type_appart = $type->fetchAll();
        foreach ($type_appart as $type) {
            $typappart->addMultiOptions(array($type->TYPAPPART => $type->TYPAPPART));
        }
        
        // alimente la liste deroulante arrondissement
        $arron = new Application_Model_DbTable_Arrondissement();
        $arrondiss_dem = $arron->fetchAll();
        foreach ($arrondiss_dem as $arron) {
            $arrondissement->addMultiOptions(array($arron->ARRONDISS_DEM =>$arron->ARRONDISS_DEM ));
        }
        
        // alimente la liste deroulante ascenseur
        $bool = new Application_Model_DbTable_Appartement();
        $oui = $bool->fetchAll();
        foreach ($oui as $bool) {
            $ascenseur->addMultiOptions(array($bool->ASCENSEUR => $bool->ASCENSEUR));
        }
        
        // alimente la liste deroulante preavis
        $date_preavis = new Application_Model_DbTable_Appartement();
        $prepre = $date_preavis->fetchAll();
        foreach ($prepre as $date_preavis) {
            $preavis->addMultiOptions(array($date_preavis->PREAVIS => $date_preavis->PREAVIS));
        }
        
        // alimente la liste deroulante numeroprop
        $idprop = new Application_Model_DbTable_Proprietaire();
        $Propri = $idprop->fetchAll();
        foreach ($Propri as $idprop) {
        $numeroprop->addMultiOptions(array($idprop->NUMEROPROP => $idprop->NUMEROPROP));
        }

         //alimente la liste deroulante numereloc
        $num = new Application_Model_DbTable_Locataire();
        $locataire = $num->fetchAll();
        foreach ($locataire as $num) {
            $numeroloc->addMultiOptions(array($num->NUMEROLOC => $num->NUMEROLOC));
        }
    

            $this->addElements(array($numappart, $typappart, $prix_loc, $prix_charg, $rue, $arrondissement, $etage, $ascenseur, $preavis, $date_libre, $numeroprop, $numeroloc, $envoyer));
        }
    }
    

