<?php

class Application_Model_DbTable_Demande extends Zend_Db_Table_Abstract
{

    protected $_name = 'demande';
    
        public function ajouterDemande($num_dem, $num_cli, $type_dem, $date_limite) {
        $data = array(
            'NUM_DEM' => $num_dem,
            'NUM_CLI' => $num_cli,
            'TYPE_DEM' => $type_dem,
            'DATE_LIMITE' => $date_limite,
        );
        $this->insert($data);
    }
    public function existeDemande($num_dem){
        
    }

    public function obtenirDemande($num_dem) {
        $row = $this->fetchRow("NUM_DEM='" . $num_dem . " ' ");
        if(!$row) {
            throw new Exception("Impossible de trouver l'enregistrement $num_dem");
        }
        return $row->toArray();
    }
    public function modifierDemande($num_dem, $num_cli, $type_dem, $date_limite) {
        $data = array(
            'NUM_DEM' => $num_dem,
            'NUM_CLI' => $num_cli,
            'TYPE_DEM' => $type_dem,
            'DATE_LIMITE' => $date_limite,
        );
        $this->update($data, "NUM_DEM='" . $num_dem . "'");
    }
    public function supprimerDemande($num_dem) {
        $this->delete("NUM_DEM='" . $num_dem . "'");
    }


}

