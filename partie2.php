<?php

// 2.1 — Constructeur avec valeurs par défaut
class Voiture {
    public string $couleur;
    public int $vitesse;

    public function __construct(string $couleur = "Blanche", int $vitesse = 0) {
        $this->couleur = $couleur;
        $this->vitesse = $vitesse;
    }

    public function afficher(): void {
        echo "Couleur : {$this->couleur} | Vitesse : {$this->vitesse} km/h" . PHP_EOL;
    }
}

$v1 = new Voiture();
$v2 = new Voiture("Rouge", 50);
$v3 = new Voiture("Noire");
$v1->afficher();
$v2->afficher();
$v3->afficher();

// 2.1.b — La promotion de propriétés permet d'écrire directement :
class VoiturePromue {
    public function __construct(
        public string $couleur = "Blanche",
        public int $vitesse = 0
    ) {}

    public function afficher(): void {
        echo "Couleur : {$this->couleur} | Vitesse : {$this->vitesse} km/h" . PHP_EOL;
    }
}

$v4 = new VoiturePromue("Bleue", 80);
$v4->afficher();

// 2.2 — Un seul constructeur peut couvrir les deux cas avec des valeurs par défaut.
class Personne {
    public function __construct(
        public string $nom = "",
        public string $prenom = ""
    ) {
        echo "Création " . __CLASS__ . PHP_EOL;
    }
}

$personneVide = new Personne();
$personneRenseignee = new Personne("Hachimi", "Sara");

// 2.2.c — Exemple de méthode statique de fabrique (named constructor).
class PersonneDepuisTableau {
    private function __construct(
        public string $nom,
        public string $prenom
    ) {}

    public static function depuisTableau(array $data): self {
        return new self($data['nom'], $data['prenom']);
    }
}

$personne = PersonneDepuisTableau::depuisTableau([
    'nom' => 'Hachimi',
    'prenom' => 'Sara',
]);

// 2.3 — Destructeur : unset() détruit l'objet dès qu'il n'a plus de référence.
class VoitureAvecDestructeur {
    public function __construct(public string $couleur) {
        echo "Voiture {$this->couleur} créée." . PHP_EOL;
    }

    public function __destruct() {
        echo "Voiture {$this->couleur} détruite." . PHP_EOL;
    }
}

$maVoiture = new VoitureAvecDestructeur("Blanche");
unset($maVoiture);
echo "Fin du script." . PHP_EOL;

$a = new VoitureAvecDestructeur("Rouge");
$b = new VoitureAvecDestructeur("Noire");
echo "Fin du script avec deux voitures." . PHP_EOL;
// À la fin du script, les destructeurs de $b puis $a sont appelés.

class PersonneAvecDestructeur {
    public function __construct(public string $nom) {}

    public function __destruct() {
        echo "Détruire " . __CLASS__ . PHP_EOL;
    }
}

$p = new PersonneAvecDestructeur("Hachimi");
unset($p);

