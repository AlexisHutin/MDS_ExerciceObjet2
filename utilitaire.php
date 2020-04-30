<?php
// CONSTANTES
define('ARME', 0);
define('MAGIE', 1);
define('LIVRE', 2);

class Utilitaire
{
    public function getObjetAuHasard($categorie = ARME)
    {
        $objets = [
            ARME => ['Arc', 'Lance', 'Baton', 'Marteau', 'Epée', 'Arbalète', 'Hache', 'Dague', 'Couteau'],
            MAGIE => ['Poudre de lune', 'Dent de dragon', 'Potion bleu', 'Potion verte', 'Poison', 'Venin', 'Plume de phénix'],
            LIVRE => ['Guide des sortilèges', 'Manuel de survie', 'Carte du Royaume'],
        ];
        return $objets[$categorie][rand(0, count($objets[$categorie]) - 1)];
    }

    public function combat($combattant1, $combattant2)
    {
        if ($combattant1->puissance() > $combattant2->puissance()){
            return true;
        }
        else{
            return false;
        }
    }

}
?>