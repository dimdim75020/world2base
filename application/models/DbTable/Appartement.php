<?php

class Application_Model_DbTable_Appartement extends Zend_Db_Table_Abstract
{

    protected $_name = 'appartement';
    protected $_primary = 'NUMAPPART';
    protected $_rowClass = 'Application_Model_DbTable_AppartementRow';
    
    protected $_referenceMap = array(
        'MonProprio' => array(
            'columns' => 'NUMEROPROP',
            'refTableClass' => 'Application_Model_DbTable_Proprietaire',
            'refColumns' => 'NUMEROPROP'
        ),
        'MonLocataire' => array(
            'columns' => 'NUMEROLOC',
            'refTableClass' => 'Application_Model_DbTable_Locataire',
            'refColumns' => 'NUMEROLOC'
        ),
        );
        
        
 
    
    
   
    public function ajouterAppartement($numappart, $typappart, $prix_loc, $prix_charg, $rue, $arrondissement, $etage, $ascenseur, $preavis, $date_libre, $numeroprop, $numeroloc) {
        $data = array(
            'NUMAPPART' => $numappart,
            'TYPAPPART' => $typappart,
            'PRIX_LOC' => $prix_loc,
            'PRIX_CHARG' => $prix_charg,
            'RUE' => $rue,
            'ARRONDISSEMENT' => $arrondissement,
            'ETAGE' => $etage,
            'ASCENSEUR' => $ascenseur,
            'PREAVIS' => $preavis,
            'DATE_LIBRE' => $date_libre,
            'NUMEROPROP' => $numeroprop,
            'NUMEROLOC' => $numeroloc,
        );
        $this->insert($data);
    }
    
    public function obtenirAppartement($numappart) {
        $row = $this->fetchRow("NUMAPPART='" . $numappart . " ' ");
        if(!$row) {
            throw new Exception("Impossible de trouver l'enregistrement $numappart");
        }
        return $row->toArray();
    }
    public function modifierAppartement($numappart, $typappart, $prix_loc, $prix_charg, $rue, $arrondissement, $etage, $ascenseur, $preavis, $date_libre, $numeroprop, $numeroloc) {
        $data = array(
            'NUMAPPART' => $numappart,
            'TYPAPPART' => $typappart,
            'PRIX_LOC' => $prix_loc,
            'PRIX_CHARG' => $prix_charg,
            'RUE' => $rue,
            'ARRONDISSEMENT' => $arrondissement,
            'ETAGE' => $etage,
            'ASCENSEUR' => $ascenseur,
            'PREAVIS' => $preavis,
            'DATE_LIBRE' => $date_libre,
            'NUMEROPROP' => $numeroprop,
            'NUMEROLOC' => $numeroloc,
        );
        $this->update($data, "NUMAPPART='" . $numappart . "'");
    }
    public function supprimerAppartement($numappart) {
        $this->delete("NUMAPPART='" . $numappart . "'");
    }


}

                                        /*
                                        * NUMAPPART
                                       TYPAPPART
                                       PRIX_LOC
                                       PRIX_CHARG
                                       RUE
                                       ARRONDISSEMENT
                                       ETAGE
                                       ASCENSEUR
                                       PREAVIS
                                       DATE_LIBRE
                                       NUMEROPROP
                                       NUMEROLOC
                                        */
