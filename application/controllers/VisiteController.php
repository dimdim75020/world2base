<?php

class VisiteController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $lesVisites = new Application_Model_DbTable_Visite();
        $this->view->lesVisites = $lesVisites->fetchAll();
    }

    public function ajouterAction()
    {
        $form = new Application_Form_Visite();
        $form->envoyer->setLabel('Ajouter');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)){
                $num_cli = $form->getValue('NUM_CLI');
                $numappart = $form->getValue('NUMAPPART');
                $date_visite = $form->getValue('DATE_VISITE');
                $lesVisites = new Application_Model_DbTable_Visite();
                $lesVisites->ajouterVisite($num_cli, $numappart, $date_visite);
                $this->_helper->redirector('index');                               
            } else {
                $form->populate($formData);
            }
        }
    }

public function modifierAction() {

        $form = new Application_Form_Visite();
        $form->envoyer->setLabel('Modifier');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $num_cli = $form->getValue('NUM_CLI');
                $numappart = $form->getValue('NUMAPPART');
                $date_visite = $form->getValue('DATE_VISITE');

                $lesVisites = new Application_Model_DbTable_Visite();
                $lesVisites->modifierVisite($num_cli, $numappart, $date_visite);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $num_cli = $this->_getParam('NUM_CLI', 0);
            $numappart = $this->_getParam('NUMAPPART', 0);
            $lesVisites = NEW Application_Model_DbTable_Visite();
            $form->populate($lesVisites->obtenirVisite($num_cli, $numappart));
        } // action body
    }

    public function supprimerAction() {
        if ($this->getRequest()->isPost()) {
            $supprimer = $this->getRequest()->getPost('Supprimer');
            if ($supprimer == 'Oui') {
                $num_cli = $this->getRequest()->getPost('NUM_CLI');
                $numappart = $this->getRequest()->getPost('NUMAPPART');
                $lesVisites = new Application_Model_DbTable_Visite();
                $lesVisites->supprimerVisite($num_cli, $numappart);
            }
            $this->_redirect('/visite');
        } else {
            $num_cli = $this->_getparam('NUM_CLI', 0);
            $numappart = $this->_getParam('NUMAPPART', 0);
            $lesVisites = new Application_Model_DbTable_Visite();
            $this->view->visite = $lesVisites->obtenirVisite($num_cli, $numappart);
        }
    }

}











