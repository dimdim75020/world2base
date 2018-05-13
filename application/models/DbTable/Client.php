<?php

class Application_Model_DbTable_Client extends Zend_Db_Table_Abstract
{

    protected $_name = 'client';
    
    public function ajouterClient($num_cli, $nom_cli, $prenom_cli, $adresse_cli, $codeville_cli, $tel_cli) {
        $data = array(
            'NUM_CLI' => $num_cli,
            'NOM_CLI' => $nom_cli,
            'PRENOM_CLI' => $prenom_cli,
            'ADRESSE_CLI' => $adresse_cli,
            'CODEVILLE_CLI' => $codeville_cli,
            'TEL_CLI' => $tel_cli,
        );
        $this->insert($data);
    }
    
    public function obtenirCLient($num_cli) {
        $row = $this->fetchRow("NUM_CLI='" . $num_cli . " ' ");
        if(!$row) {
            throw new Exception("Impossible de trouver l'enregistrement $num_cli");
        }
        return $row->toArray();
    }
    public function modifierClient($num_cli, $nom_cli, $prenom_cli, $adresse_cli, $codeville_cli, $tel_cli) {
        $data = array(
            'NUM_CLI' => $num_cli,
            'NOM_CLI' => $nom_cli,
            'PRENOM_CLI' => $prenom_cli,
            'ADRESSE_CLI' => $adresse_cli,
            'CODEVILLE_CLI' => $codeville_cli,
            'TEL_CLI' => $tel_cli,
        );
        $this->update($data, "NUM_CLI='" . $num_cli . "'");
    }
    public function supprimerCLient($num_cli) {
        $this->delete("NUM_CLI='" . $num_cli . "'");
    }
        
}


?>