<?php

class AppartementController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $lesAppartements = new Application_Model_DbTable_Appartement();
        $this->view->lesAppartements = $lesAppartements->fetchAll();
    }

    public function supprimerAction() {
        if ($this->getRequest()->isPost()) {
            $supprimer = $this->getRequest()->getPost('supprimer');
            if ($supprimer == 'Oui') {
                $numappart = $this->getRequest()->getPost('NUMAPPART');
                $lesAppartements = new Application_Model_DbTable_Appartement();
                $lesAppartements->supprimerAppartement($numappart);
            }
            $this->_redirect('/appartement');
        } else {
            $numappart = $this->_getParam('NUMAPPART', 0);
            $lesAppartements = new Application_Model_DbTable_Appartement();
            $this->view->appartement = $lesAppartements->obtenirAppartement($numappart);
        }
    }

    public function ajouterAction() {
        $form = new Application_Form_Appartement();
        $form->envoyer->setLabel('Ajouter');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $numappart = $form->getValue('NUMAPPART');
                $typappart = $form->getValue('TYPAPPART');
                $prix_loc = $form->getValue('PRIX_LOC');
                $prix_charg = $form->getValue('PRIX_CHARG');
                $rue = $form->getValue('RUE');
                $arrondissement = $form->getValue('ARRONDISSEMENT');
                $etage = $form->getValue('ETAGE');
                $ascenseur = $form->getValue('ASCENSEUR');
                $preavis = $form->getValue('PREAVIS');
                $date_libre = $form->getValue('DATE_LIBRE');
                $numeroprop = $form->getValue('NUMEROPROP');
                $numeroloc = $form->getValue('NUMEROLOC');
                $lesAppartements = new Application_Model_DbTable_Appartement();
                $lesAppartements->ajouterAppartement($numappart, $typappart, $prix_loc, $prix_charg, $rue, $arrondissement, $etage, $ascenseur, $preavis, $date_libre, $numeroprop, $numeroloc);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function modifierAction() {
        $form = new Application_Form_Appartement();
        $form->envoyer->setLabel('Sauvegarder');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $numappart = $form->getValue('NUMAPPART');
                $typappart = $form->getValue('TYPAPPART');
                $prix_loc = $form->getValue('PRIX_LOC');
                $prix_charg = $form->getValue('PRIX_CHARG');
                $rue = $form->getValue('RUE');
                $arrondissement = $form->getValue('ARRONDISSEMENT');
                $etage = $form->getValue('ETAGE');
                $ascenseur = $form->getValue('ASCENSEUR');
                $preavis = $form->getValue('PREAVIS');
                $date_libre = $form->getValue('DATE_LIBRE');
                $numeroprop = $form->getValue('NUMEROPROP');
                $numeroloc = $form->getValue('NUMEROLOC');
                $lesAppartements = new Application_Model_DbTable_Appartement();
                $lesAppartements->modifierAppartement($numappart, $typappart, $prix_loc, $prix_charg, $rue, $arrondissement, $etage, $ascenseur, $preavis, $date_libre, $numeroprop, $numeroloc);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $numappart = $this->_getParam('NUMAPPART', 0);
            $lesAppartements = new Application_Model_DbTable_Appartement();
            $form->populate($lesAppartements->obtenirAppartement($numappart));
        }
    }

    public function proprioAction() {
        $numappart = $this->_getParam('NUMAPPART', 0);
        $lesAppartements = new Application_Model_DbTable_Appartement();
        $unAppart = $lesAppartements->find($numappart)->current();
        $unProprietaire = $unAppart->getProprio();
        $db = Zend_Db_Table::getDefaultAdapter();
        $this->view->proprietaire = $unProprietaire;
    }

    public function locataireAction() {
        $numappart = $this->_getParam('NUMAPPART', 0);
        $lesAppartements = new Application_Model_DbTable_Appartement();
        $unAppart = $lesAppartements->find($numappart)->current();
        $unLocataire = $unAppart->getlocataire();
        $this->view->locataire = $unLocataire;
    }

    public function appartAction() {

        $db = zend_db_table::getDefaultAdapter();
        $numeroprop = $this->getRequest()->getPost('NUMEROPROP');

        $query = 'SELECT NUMAPPART,TYPAPPART,PRIX_LOC,PRIX_CHARG,RUE,ARRONDISSEMENT,ETAGE,ASCENSEUR,PREAVIS,DATE_LIBRE FROM appartement WHERE NUMEROPROP = \''. $numeroprop .
                '\'GROUP BY NUMAPPART';
        $appartement = $db->fetchAll($query);
        $this->view->appartement = $appartement;
        var_dump($appartement);
    }

}
