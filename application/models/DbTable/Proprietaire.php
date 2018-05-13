<?php

class Application_Model_DbTable_Proprietaire extends Zend_Db_Table_Abstract
{

    protected $_name = 'proprietaire';
    
    public function ajouterProprietaire($numeroprop, $nom, $prenom, $adresse, $code_ville, $tel) {
        $data = array(
            'NUMEROPROP' => $numeroprop,
            'NOM' => $nom,
            'PRENOM' => $prenom,
            'ADRESSE' => $adresse,
            'CODE_VILLE' => $code_ville,
            'TEL' => $tel,
        );
        $this->insert($data);
    }
    
    public function obtenirProprietaire($numeroprop) {
        $row = $this->fetchRow("NUMEROPROP='" . $numeroprop . " ' ");
        if(!$row) {
            throw new Exception("Impossible de trouver l'enregistrement $numeroprop");
        }
        return $row->toArray();
    }
    public function modifierProprietaire($numeroprop, $nom, $prenom, $adresse, $code_ville, $tel) {
        $data = array(
            'NUMEROPROP' => $numeroprop,
            'NOM' => $nom,
            'PRENOM' => $prenom,
            'ADRESSE' => $adresse,
            'CODE_VILLE' => $code_ville,
            'TEL' => $tel,
        );
        $this->update($data, "NUMEROPROP='" . $numeroprop . "'");
    }
    public function supprimerProprietaire($numeroprop) {
        $this->delete("NUMEROPROP='" . $numeroprop . "'");
    }


}

