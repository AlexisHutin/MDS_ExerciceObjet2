<?php

class Gobelin
{
    public $force;
    public $ruse;
    public $piecesDOr;
    public $objet;

    public function __construct()
    {
        $this->force = rand(5, 8);
        $this->ruse = rand(3, 5);
        $this->piecesDOr = rand(0, 20);

        //$this->objet = Utilitaire::getObjetAuHasard(ARME);
        $getObjet = new Utilitaire();
        $this->objet = $getObjet->getObjetAuHasard(ARME);

    }

    public function getPiecesDOr()
    {
        return $this->PiecesDOr;
    }

    public function puissance(){
        return $this->force + $this->ruse;
    }

}

?>