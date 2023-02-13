<?php

//Sert de test à mes fonctions.
require_once('vendor/autoload.php');

use App\Entity\Ennemi;
use App\Entity\Personnage;
use App\Entity\Spell;

$Ken = new Personnage();
$gobelin = new Ennemi();
$feu = new Spell();
$heal = new Spell();
$scan = new Spell();

$Ken->setName('Ken');
$gobelin->setName('Gobelin');
$feu->setName('boule de feu');
$heal->setName('soin');
$scan->setName('detection');

/*dump($gobelin);
dump($Ken);*/

$Ken->attack($gobelin);
$Ken->spell($scan, $gobelin);
dump($gobelin);
dump($Ken);

function Fight(Personnage $perso, Ennemi $ennemi) {
    while( $perso->getHealth() >=0 or $ennemi->getHealth() >=0 ) {
        echo ("Vous êtes attaqué. Que faire ?");

    };

}



