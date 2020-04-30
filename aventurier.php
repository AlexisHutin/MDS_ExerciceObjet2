<?php
// La class de mon aventurier
class Aventurier
{

    public $nom;

    public $force;
    public $agilite;
    public $defense;
    public $magie;
    public $pointsDeVie;

    public $inventaire = [];
    public $nbObjets = 0;
    public $piecesDOr = 0;
    public $distanceParcourue = 0; //en km

    public $estEnVie = true;

    public $acolytes = [];

    //----------------------------------------------------------------//

    public function __construct($nomChoisie)
    {
        $this->nom = $nomChoisie;

        $this->force = rand(10, 15);
        $this->agilite = rand(10, 15);
        $this->defense = rand(5, 15);
        $this->magie = rand(8, 12);
    }

    public function setPV($pV)
    {
        $this->pointsDeVie = $pV;
    }

    public function getPV()
    {
        return $this->pointsDeVie;
    }

    public function setPiecesDOr($nbPieces)
    {
        $this->$piecesDOr = $nbPieces;
    }

    public function getPiecesDOr()
    {
        return $this->$piecesDOr;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getForce()
    {
        return $this->force;
    }

    public function getAgilite()
    {
        return $this->agilite;
    }

    public function getDefense()
    {
        return $this->defence;
    }

    public function getMagie()
    {
        return $this->magie;
    }

    public function ajouteObjet($objet)
    {
        $this->nbObjets++;
        $this->inventaire[] = $objet;
    }

    public function inventaireHTML()
    {
        $out = 'Le héro a ' . $this->nbObjets . ' objet(s) dans son inventaire : ';
        foreach($this->inventaire as $value){
            $out .= $value . ' ';
        }

        return $out;
    }

    public function dansInventaire($objet)
    {
        $presentDansInventaire = false;
        $inventaire = $this->inventaire;
        if (in_array($objet,$inventaire)){
            $presentDansInventaire = true;
        }
        return $presentDansInventaire;
    }
    
    public function puissance()
    {
        return $this->force + $this->magie + $this->defense;
    }

    public function ajouteDistance($distanceEnMetre)
    {
        $distance = $this->distanceParcourue * 1000;
        $distance += $distanceEnMetre;
        $distance = $distance / 1000;
        return $distance; //en km
    }

    public function altererPV($signe, $valeur)
    {
        if ($signe == '+'){
            $this->pointsDeVie += $valeur;
        }
        else{
            $this->pointsDeVie -= $valeur;
        }
        return;
    }

    public function altererPiecesDOr($signe, $valeur)
    {
        if ($signe == '+'){
            $this->piecesDOr += $valeur;
        }
        else{
            $this->piecesDOr -= $valeur;
        }
        return;
    }

    public function nouvelAcolyte($estLeChef, $nomChoisie = 'none')
    {
        $this->acolytes[] = new Pirate($estLeChef, $nomChoisie);

    }

    public function nombreAcolytes()
    {
        return count($this->acolytes);
    }

    public function htmlAcolytes()
    {
        
        $out = '';
        foreach($this->acolytes as $acolytes){
            $out .= $acolytes->htmlPirate() . '<br/>';
        }
        
        return $out;
    }

//---------------------------------------------------------------------------------

    public function htmlAventurier($afficherAcolytes)
    {
        echo 'Nom  : ' . $this->nom . '<br/>';
        echo 'PV : ' . $this->pointsDeVie . '<br/>';
        echo 'Force : ' . $this->force . '<br/>';
        echo 'Défense : ' . $this->defense . '<br/>';
        echo 'Agilité : ' . $this->agilite . '<br/>';
        echo 'Magie : ' . $this->magie . '<br/>';
        echo 'Puissance : ' . $this->puissance() . '<br/>';
        echo 'Nb Pièces d\'or : ' . $this->piecesDOr . '<br/>';
        echo $this->inventaireHTML() . '<br/>';
        echo 'Il a parcourue ' . $this->distanceParcourue . ' km' . '<br/>';

        if ($this->estEnVie){
            echo $this->nom . ' est en vie !' . '<br/>';
        }
        else{
            echo $this->nom . ' est mort ...' . '<br/>';
        }

        echo '<br/>';

        if ($afficherAcolytes){
            echo $this->htmlAcolytes() . '<br/>';
        }
        return;
    }

    
}
?>