<?php

class Application_Model_DbTable_AppartementRow extends Zend_Db_Table_Row_Abstract
{

    
     public function getProprio() {
        $proprietaire =NULL;
        $proprietaire = $this->findParentRow('Application_Model_DbTable_Proprietaire', 'MonProprio');
        return $proprietaire;
    }
    
    public function getlocataire(){
        $locataire =NULL;
        $locataire = $this->findParentRow('Application_Model_DbTable_Locataire', 'MonLocataire');
        return $locataire;
    }

}

