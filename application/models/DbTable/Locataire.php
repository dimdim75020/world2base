<?php

class Application_Model_DbTable_Locataire extends Zend_Db_Table_Abstract
{

    protected $_name = 'locataire';
    
        public function ajouterLocataire($numeroloc, $nom_loc, $prenom_loc, $datenaiss, $tel_loc, $r_i_b, $banque, $rue_banque, $codeville_banque, $tel_banque) {
        $data = array(
            'NUMEROLOC' => $numeroloc,
            'NOM_LOC' => $nom_loc,
            'PRENOM_LOC' => $prenom_loc,
            'DATENAISS' => $datenaiss,
            'TEL_LOC' => $tel_loc,
            'R_I_B' => $r_i_b,
            'BANQUE' => $banque,
            'RUE_BANQUE' => $rue_banque,
            'CODEVILLE_BANQUE' => $codeville_banque,
            'TEL_BANQUE' => $tel_banque,
            
        );
        $this->insert($data);
    }
    
    public function obtenirLocataires($numeroloc) {
        $row = $this->fetchRow("NUMEROLOC='" . $numeroloc . " ' ");
        if(!$row) {
            throw new Exception("Impossible de trouver l'enregistrement $numeroloc");
        }
        return $row->toArray();
    }
    public function modifierLocataire($numeroloc, $nom_loc, $prenom_loc, $datenaiss, $tel_loc, $r_i_b, $banque, $rue_banque, $codeville_banque, $tel_banque) {
        $data = array(
            'NUMEROLOC' => $numeroloc,
            'NOM_LOC' => $nom_loc,
            'PRENOM_LOC' => $prenom_loc,
            'DATENAISS' => $datenaiss,
            'TEL_LOC' => $tel_loc,
            'R_I_B' => $r_i_b,
            'BANQUE' => $banque,
            'RUE_BANQUE' => $rue_banque,
            'CODEVILLE_BANQUE' => $codeville_banque,
            'TEL_BANQUE' => $tel_banque,
        );
        $this->update($data, "NUMEROLOC='" . $numeroloc . "'");
    }
    public function supprimerLocataire($numeroloc) {
        $this->delete("NUMEROLOC='" . $numeroloc . "'");
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
    TEL_BANQUE  */ ?>
