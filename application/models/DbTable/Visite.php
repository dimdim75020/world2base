<?php

class Application_Model_DbTable_Visite extends Zend_Db_Table_Abstract {

    protected $_name = 'visite';

    public function ajouterVisite($num_cli, $numappart, $date_visite) {
        $data = array(
            'NUM_CLI' => $num_cli,
            'NUMAPPART' => $numappart,
            'DATE_VISITE' => $date_visite,
        );
        $this->insert($data);
    }


  public function modifierVisite($num_cli, $numappart, $date_visite) {
        $data = array(
            'num_cli' => $num_cli,
            'numappart' => $numappart,
            'date_visite' => $date_visite);
        $this->update($data, "NUM_CLI='" . $num_cli . "'" . " and NUMAPPART='" . $numappart . "'");
    }

    public function obtenirVisite($num_cli, $numappart) {
        $row = $this->fetchRow("NUM_CLI='" . $num_cli . "'"  );
        $row2 = $this->fetchRow("NUMAPPART='" . $numappart . "'");
        if (!$row && !$row2) {
            throw NEW Exception("Impossible de trouver le numéro $num_cli et $numappart");
        }
        return $row->toArray();
        return $row2->toArray();
    }


    public function supprimerVisite($num_cli, $numappart) {
        $this->delete("NUM_CLI='" . $num_cli . "'" , "NUMAPPART='" . $numappart . "'");
    }

}



