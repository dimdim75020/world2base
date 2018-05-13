<?php

class DemandeController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $lesDemandes = new Application_Model_DbTable_Demande();
        $this->view->lesDemandes = $lesDemandes->fetchAll();
    }

    public function ajouterAction()
    {
        $form = new Application_Form_Demande();
        $form->envoyer->setLabel('Ajouter');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)){
                $num_dem = $form->getValue('NUM_DEM');
                $num_cli = $form->getValue('NUM_CLI');
                $type_dem = $form->getValue('TYPE_DEM');
                $date_limite = $form->getValue('DATE_LIMITE');
                $lesDemandes = new Application_Model_DbTable_Demande();
                $lesDemandes->ajouterDemande($num_dem, $num_cli, $type_dem, $date_limite);
                $this->_helper->redirector('index');                               
            } else {
                $form->populate($formData);
            }
        }
    }

    public function modifierAction()
    {
       $form = new Application_Form_Demande();
        $form->envoyer->setLabel('Sauvegarder');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)){
                $num_dem = $form->getValue('NUM_DEM');
                $num_cli = $form->getValue('NUM_CLI');
                $type_dem = $form->getValue('TYPE_DEM');
                $date_limite = $form->getValue('DATE_LIMITE');
                $lesDemandes = new Application_Model_DbTable_Demande();
                $lesDemandes->modifierDemande($num_dem, $num_cli, $type_dem, $date_limite);
                $this->_helper->redirector('index'); ;                               
            } else {
                $form->populate($formData);
            }
        } else {
            $num_dem = $this ->_getParam('NUM_DEM', 0);
            $lesDemandes = new Application_Model_DbTable_Demande();
            $form->populate($lesDemandes->obtenirDemande($num_dem));
        }
    }

    public function supprimerAction()
    {
         if ($this->getRequest()->isPost()) {
            $supprimer = $this->getRequest()->getPost('supprimer');
            if ($supprimer == 'Oui') {
                $num_dem = $this->getRequest()->getPost('NUM_DEM');
                $lesDemandes = new Application_Model_DbTable_Demande();
                $lesDemandes->supprimerDemande($num_dem);
            }
            $this->_redirect('/demande');
        } else {
            $num_dem = $this->_getParam('NUM_DEM', 0);
            $lesDemandes = new Application_Model_DbTable_Demande();
            $this->view->demande = $lesDemandes->obtenirDemande($num_dem);
        }
    }


}








