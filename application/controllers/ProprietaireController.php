<?php

class ProprietaireController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $lesProprietaires = new Application_Model_DbTable_Proprietaire();
        $this->view->lesProprietaires = $lesProprietaires->fetchAll();
    }

    public function ajouterAction() {
        $form = new Application_Form_Proprietaire();
        $form->envoyer->setLabel('Ajouter');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $numeroprop = $form->getValue('NUMEROPROP');
                $nom = $form->getValue('NOM');
                $prenom = $form->getValue('PRENOM');
                $adresse = $form->getValue('ADRESSE');
                $code_ville = $form->getValue('CODE_VILLE');
                $tel = $form->getValue('TEL');
                $lesProprietaires = new Application_Model_DbTable_Proprietaire();
                $lesProprietaires->ajouterProprietaire($numeroprop, $nom, $prenom, $adresse, $code_ville, $tel);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function modifierAction() {
        $form = new Application_Form_Proprietaire();
        $form->envoyer->setLabel('Sauvegarder');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $numeroprop = $form->getValue('NUMEROPROP');
                $nom = $form->getValue('NOM');
                $prenom = $form->getValue('PRENOM');
                $adresse = $form->getValue('ADRESSE');
                $code_ville = $form->getValue('CODE_VILLE');
                $tel = $form->getValue('TEL');
                $lesProprietaires = new Application_Model_DbTable_Proprietaire();
                $lesProprietaires->modifierProprietaire($numeroprop, $nom, $prenom, $adresse, $code_ville, $tel);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $num = $this->_getParam('NUMEROPROP', 0);
            $lesProprietaires = new Application_Model_DbTable_Proprietaire();
            $form->populate($lesProprietaires->obtenirProprietaire($num));
        }
    }

    public function supprimerAction() {
        if ($this->getRequest()->isPost()) {
            $supprimer = $this->getRequest()->getPost('supprimer');
            if ($supprimer == 'Oui') {
                $numeroprop = $this->getRequest()->getPost('NUMEROPROP');
                $lesProprietaires = new Application_Model_DbTable_Proprietaire();
                $lesProprietaires->supprimerProprietaire($numeroprop);
            }
            $this->_redirect('/proprietaire');
        } else {
            $numeroprop = $this->_getParam('NUMEROPROP', 0);
            $lesProprietaires = new Application_Model_DbTable_Proprietaire();
            $this->view->proprietaire = $lesProprietaires->obtenirProprietaire($numeroprop);
        }
    }

    // Liste tous les proprietaires avec le total de leurs cotisations
    public function cotiserAction() {
        $db = Zend_Db_Table::getDefaultAdapter();
        $query = "SELECT PROPRIETAIRE.numeroprop as NUMEROPROP, "
                . "PROPRIETAIRE.nom as NOM, "
                . "PROPRIETAIRE.prenom as PRENOM, "
                . "PROPRIETAIRE.adresse as ADRESSE, "
                . "PROPRIETAIRE.code_ville as CODE_VILLE, "
                . "PROPRIETAIRE.tel as TEL, "
                . "ROUND(SUM(prix_loc + prix_charg)* 0.07, 2) AS COTISATIONS "
                . "FROM APPARTEMENT, PROPRIETAIRE "
                . "WHERE APPARTEMENT.numeroprop = PROPRIETAIRE.numeroprop "
                . "GROUP BY PROPRIETAIRE.numeroprop";
        $cotisers = $db->fetchAll($query);
        $this->view->cotisers = $cotisers;
    }

    //Liste le details des cotisations par appatement
    public function detailscotisationsAction() {
        $NUMEROPROP = $this->_getParam('NUMEROPROP');
        $db = Zend_Db_Table::getDefaultAdapter();
        $query = "SELECT APPARTEMENT.numappart as NUMAPPART, "
                . "ROUND(SUM(prix_loc + prix_charg), 2) as LOYER, "
                . "ROUND(SUM(prix_loc + prix_charg) * 0.07, 2) AS COTISATIONS "
                . "FROM APPARTEMENT WHERE APPARTEMENT.numeroprop = '$NUMEROPROP' "
                . "GROUP BY APPARTEMENT.numappart";
        $detailsCotisers = $db->fetchAll($query);

        $query2 = "SELECT ROUND(SUM(prix_charg + prix_loc) * 0.07,2) AS TOTALCOTISATIONS "
                . "FROM APPARTEMENT "
                . " WHERE APPARTEMENT.numeroprop = '$NUMEROPROP'";
        $totalDetailsCotisers = $db->fetchAll($query2);
        $this->view->detailsCotisers = $detailsCotisers;
        $this->view->totalDetailsCotisers = $totalDetailsCotisers;
        $this->view->NUMEROPROP = $NUMEROPROP;
    }


}
