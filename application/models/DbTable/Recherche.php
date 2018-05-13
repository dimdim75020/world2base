<?php

class Application_Model_DbTable_Recherche extends Zend_Db_Table_Abstract {

    public function getRechercheAppart($arrondissement, $typappart, $loyermin, $loyermax) {


        $db = Zend_Db_Table::getDefaultAdapter();
        if ($loyermin == NULL) {                //Si $loyermin est a NULL alors on lui affectera le plus petit loyer
            $query1 = "SELECT MIN(PRIX_CHARG + PRIX_LOC) from appartement";
            $tabLeLoyerMin = $db->FetchAll($query1);
            foreach ($tabLeLoyerMin as $leLoyerMin) {
                $loyermin = $leLoyerMin['MIN(PRIX_CHARG + PRIX_LOC)']; // On recupere le loyer MIN
            }
        }

        if ($loyermax == NULL) {
            $query2 = "SELECT MAX(PRIX_CHARG + PRIX_LOC) from appartement";
            $tabLeLoyerMax = $db->FetchAll($query2);
            foreach ($tabLeLoyerMax as $leLoyerMax) {
                $loyermax = $leLoyerMax['MAX(PRIX_CHARG + PRIX_LOC)']; // On recupere le loyer MAX 
            }

            if ($arrondissement == NULL) {
                $reqArrondissemet = "";
            } else {
                $reqArrondissemet = " AND ARRONDISSEMENT =" . $arrondissement;
            }if ($typappart == NULL) {
                $reqTypeAppart = "";
            } else {
                $reqTypeAppart = " AND TYPAPPART = '" . $typappart . "'";
            }
            $query = "select * from appartement where PRIX_LOC + PRIX_CHARG BETWEEN " . $loyermin . " AND " . $loyermax . " " . $reqArrondissemet . " " . $reqTypeAppart . "  AND NUMEROLOC = 0";
            $lesapparts = $db->fetchAll($query);

            return $lesapparts;
        }
    }

}
