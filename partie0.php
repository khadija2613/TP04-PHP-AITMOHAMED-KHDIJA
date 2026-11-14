<?php
class Voiture {
    public $marque;
    public function setMarque($m){
        $this->marque = $m;     //this = l'objet qui appelle la methode
    }
public function afficher (){
    echo"Marque: ".$this->marque . PHP_EOL;
}
}
$v1 = new Voiture();
$v1->setMarque("Toyota");
$v1->afficher();
// exercice 0
$v1= new Voiture();
$v1->setMarque("Toyota");
$v1->afficher();
$v2= new Voiture();
$v2->setMarque("Renault");
$v2->afficher();
