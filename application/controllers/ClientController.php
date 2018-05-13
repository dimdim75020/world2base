<?php

class ClientController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $lesClients = new Application_Model_DbTable_Client();
        $this->view->lesClients = $lesClients->fetchAll();
    }

    public function supprimerAction() {
        if ($this->getRequest()->isPost()) {
            $supprimer = $this->getRequest()->getPost('supprimer');
            if ($supprimer == 'Oui') {
                $num_cli = $this->getRequest()->getPost('NUM_CLI');
                $lesClients = new Application_Model_DbTable_Client();
                $lesClients->supprimerClient($num_cli);
            }
            $this->_redirect('/client');
        } else {
            $num_cli = $this->_getParam('NUM_CLI', 0);
            $lesClients = new Application_Model_DbTable_Client();
            $this->view->client = $lesClients->obtenirCLient($num_cli);
        }
    }

    public function modifierAction(){
        $form = new Application_Form_Client();
        $form->envoyer->setLabel('Sauvegarder');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)){
                $num_cli = $form->getValue('NUM_CLI');
                $nom_cli = $form->getValue('NOM_CLI');
                $prenom_cli = $form->getValue('PRENOM_CLI');
                $adresse_cli = $form->getValue('ADRESSE_CLI');
                $codeville_cli = $form->getValue('CODEVILLE_CLI');
                $tel_cli = $form->getValue('TEL_CLI');
                $lesClients = new Application_Model_DbTable_Client();
                $lesClients->modifierClient($num_cli, $nom_cli, $prenom_cli, $adresse_cli, $codeville_cli, $tel_cli);
                $this->_helper->redirector('index');                               
            } else {
                $form->populate($formData);
            }
        } else {
            $num_cli = $this ->_getParam('NUM_CLI', 0);
            $lesClients = new Application_Model_DbTable_Client();
            $form->populate($lesClients->obtenirCLient($num_cli));
        }
    }

    public function ajouterAction()
    {
        $form = new Application_Form_Client();
        $form->envoyer->setLabel('Ajouter');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)){
                $num_cli = $form->getValue('NUM_CLI');
                $nom_cli = $form->getValue('NOM_CLI');
                $prenom_cli = $form->getValue('PRENOM_CLI');
                $adresse_cli = $form->getValue('ADRESSE_CLI');
                $codeville_cli = $form->getValue('CODEVILLE_CLI');
                $tel_cli = $form->getValue('TEL_CLI');
                $lesClients = new Application_Model_DbTable_Client();
                $lesClients->ajouterClient($num_cli, $nom_cli, $prenom_cli, $adresse_cli, $codeville_cli, $tel_cli);
                $this->_helper->redirector('index');                               
            } else {
                $form->populate($formData);
            }
        }
    }


}









