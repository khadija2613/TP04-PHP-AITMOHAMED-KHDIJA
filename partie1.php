<?php
class Personne {

    //Attributs publics
    public string $nom;
    public string $prenom;

    // Attributs privés 
    private string $dateNaissance;   // format "ANNEE-MOI-JOUR"
    private string $villeNaissance;
    private string $cin;

    //  Constructeur 
    public function __construct(
        string $nom,
        string $prenom,
        string $dateNaissance,
        string $villeNaissance,
        string $cin
    ) {
    }

    // Méthode publique
    public function getName(): string {
      
    }

    // Méthode privée 
    private function getAge(): int {
}
}
$p = new Personne("Hachimi", "Sara", "2000-05-12", "Casablanca", "EE123456");
echo $p->getName() . PHP_EOL;
echo $p->nom . PHP_EOL;
echo $p->cin;
echo $p->dateNaissance;
echo $p->getAge();
