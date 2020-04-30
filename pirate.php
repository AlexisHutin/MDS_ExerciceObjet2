<?php
//la class du méchant pirate
class Pirate
{

    public $nom;

    public $force;
    public $ivresse;
    public $estLeChef;


    public function __construct($estLeChef, $nomChoisie = 'none')
    {
        $listeNoms = ['Barbe Rousse', 'Barbe Noir', 'Barbe Bleu', 'Barbe Verte', 'Jack Sparrow', 'Capitaine Crochet'];

        if ($nomChoisie != 'none'){
            $this->nom = $nomChoisie; 
        }
        else{
            $this->nom = $listeNoms[rand(0, count($listeNoms)-1)];
        }
        
        if ($estLeChef){
            $this->estLeChef = true;
        }
        else{
            $this->estLeChef = false;
        }

        $this->force = rand(10, 15);
        $this->ivresse = rand(0, 5);
    }

    public function puissance()
    {
        $puissance = $this->force - $this->ivresse;

        if ($this->estLeChef){
            $puissance += 3;
        }

        return $puissance;
    }

    public function htmlPirate()
    {
        $out = 'Nom du pirate : ' . $this->nom . '<br/>';
        $out .= 'Force : ' . $this->force . '<br/>';
        $out .= 'Ivrersse : ' . $this->ivresse . '<br/>';
        $out .= 'Puissance : ' . $this->puissance() . '<br/>';

        if ($this->estLeChef){
            $out .= 'C\'est le chef des pirates !' . '<br/>';
        }
        
        return $out;
    }
}


?>