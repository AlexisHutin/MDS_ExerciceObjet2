<?php
include('aventurier.php');
include('pirate.php');
include('utilitaire.php');
include('gobelin.php');

$monAventurier = new Aventurier('Jean-Pierre');
$monAventurier->setPV(100);
$monAventurier->ajouteObjet('Dague');

$monAventurier->nouvelAcolyte(true);
$monAventurier->nouvelAcolyte(false, 'Vendredi');
$monAventurier->nouvelAcolyte(false, 'Jeudi');

$bandeDeGobelins = [
    $gobelin1 = new Gobelin(),
    $gobelin2 = new Gobelin(),
    $gobelin3 = new Gobelin(),
    $gobelin4 = new Gobelin(),
];

$monAventurier->htmlAventurier(true);
//----------------------------------------------------------------
///*
echo '<pre>';
print_r($monAventurier);
print_r($bandeDeGobelins);
echo '</pre>';
//*/
//-------------------------COMBATS--------------------------------

$combat = new Utilitaire;

echo $combat->combat($monAventurier->acolytes[0], $bandeDeGobelins[0]);
echo $combat->combat($monAventurier->acolytes[1], $bandeDeGobelins[1]);
echo $combat->combat($monAventurier->acolytes[2], $bandeDeGobelins[2]);

//----------------------------------------------------------------




?>