<?php

class LocataireController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $lesLocataires = new Application_Model_DbTable_Locataire();
        $this->view->lesLocataires = $lesLocataires->fetchAll();
    }

    public function ajouterAction()
    {
        $form = new Application_Form_Locataire();
        $form->envoyer->setLabel('Ajouter');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)){
                $numeroloc = $form->getValue('NUMEROLOC');
                $nom_loc = $form->getValue('NOM_LOC');
                $prenom_loc = $form->getValue('PRENOM_LOC');
                $datenaiss = $form->getValue('DATENAISS');
                $tel_loc = $form->getValue('TEL_LOC');
                $r_i_b = $form->getValue('R_I_B');
                $banque = $form->getValue('BANQUE');
                $rue_banque = $form->getValue('RUE_BANQUE');
                $codeville_banque = $form->getValue('CODEVILLE_BANQUE');
                $tel_banque = $form->getValue('TEL_BANQUE');
                $lesLocataires = new Application_Model_DbTable_Locataire();
                $lesLocataires->ajouterLocataire($numeroloc, $nom_loc, $prenom_loc, $datenaiss, $tel_loc, $r_i_b, $banque, $rue_banque, $codeville_banque, $tel_banque);
                $this->_helper->redirector('index');                               
            } else {
                $form->populate($formData);
            }
        }
    }

    public function modifierAction()
    {
       $form = new Application_Form_Locataire();
        $form->envoyer->setLabel('Sauvegarder');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)){
                $numeroloc = $form->getValue('NUMEROLOC');
                $nom_loc = $form->getValue('NOM_LOC');
                $prenom_loc = $form->getValue('PRENOM_LOC');
                $datenaiss = $form->getValue('DATENAISS');
                $tel_loc = $form->getValue('TEL_LOC');
                $r_i_b = $form->getValue('R_I_B');
                $banque = $form->getValue('BANQUE');
                $rue_banque = $form->getValue('RUE_BANQUE');
                $codeville_banque = $form->getValue('CODEVILLE_BANQUE');
                $tel_banque = $form->getValue('TEL_BANQUE');
                $lesLocataires = new Application_Model_DbTable_Locataire();
                $lesLocataires->modifierLocataire($numeroloc, $nom_loc, $prenom_loc, $datenaiss, $tel_loc, $r_i_b, $banque, $rue_banque, $codeville_banque, $tel_banque);
                $this->_helper->redirector('index');                               
            } else {
                $form->populate($formData);
            }
        } else {
            $numeroloc = $this ->_getParam('NUMEROLOC', 0);
            $lesLocataires = new Application_Model_DbTable_Locataire();
            $form->populate($lesLocataires->obtenirLocataires($numeroloc));
        }
    }

    public function supprimerAction() {
        if ($this->getRequest()->isPost()) {
            $supprimer = $this->getRequest()->getPost('supprimer');
            if ($supprimer == 'Oui') {
                $numeroloc = $this->getRequest()->getPost('NUMEROLOC');
                
                $db = zend_db_table::getDefaultAdapter();
                $query = "UPDATE appartement SET NUMEROLOC = '0' WHERE NUMEROLOC =".$numeroloc;
                $db->exec($query);
                
                $lesLocataires = new Application_Model_DbTable_Locataire();
                $lesLocataires->supprimerLocataire($numeroloc);
            }
            $this->_redirect('/locataire');
        } else {
            $numeroloc = $this->_getParam('NUMEROLOC', 0);
            $lesLocataires = new Application_Model_DbTable_Locataire();
            $this->view->locataire = $lesLocataires->obtenirLocataires($numeroloc);
        }
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
    TEL_BANQUE  */



