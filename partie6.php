<?php
// 6.1 — Héritage simple
class Animal {
    public function manger(): void {
        echo "Je mange." . PHP_EOL;
    }
}

class Chien extends Animal {
    public function aboyer(): void {
        echo "Wouf !" . PHP_EOL;
    }
}

class Chat extends Animal {
    public function miauler(): void {
        echo "Miaou !" . PHP_EOL;
    }
}

$chien = new Chien();
$chien->manger();
$chien->aboyer();
$chat = new Chat();
$chat->manger();
$chat->miauler();

// 6.2 — parent::__construct() et redéfinition
class PersonnePresentation {
    public function __construct(protected string $nom) {}

    public function presentation(): string {
        return "Je suis " . $this->nom;
    }
}

class EtudiantPresentation extends PersonnePresentation {
    public function __construct(string $nom, private string $filiere) {
        parent::__construct($nom);
    }

    public function presentation(): string {
        return parent::presentation() . ", étudiant en " . $this->filiere;
    }
}

$etudiantPresentation = new EtudiantPresentation("Ahmed", "Informatique");
echo $etudiantPresentation->presentation() . PHP_EOL;

// 6.3 — final et readonly
class Base {
    final public function afficher(): void {
        echo "Méthode finale" . PHP_EOL;
    }
}

final class Outil {
    public const VERSION = "1.0";
}

class Produit {
    public function __construct(public readonly string $reference) {}
}

$produit = new Produit("REF-001");
echo $produit->reference . PHP_EOL;
// Les trois essais interdits (redéfinir afficher, étendre Outil,
// modifier reference) sont expliqués dans reponses_partie6.md.

// 6.4 — Personne et Etudiant réutilisables
class Personne {
    public function __construct(
        public string $nom,
        public string $prenom,
        private string $dateNaissance,
        private string $villeNaissance,
        private string $cin
    ) {}

    protected function getAge(): int {
        $naissance = new DateTime($this->dateNaissance);
        return $naissance->diff(new DateTime())->y;
    }

    public function __toString(): string {
        return $this->prenom . ' ' . $this->nom . ' (' . $this->getAge() . ' ans)';
    }
}

class Etudiant extends Personne {
    public function __construct(
        string $nom,
        string $prenom,
        string $dateNaissance,
        string $villeNaissance,
        string $cin,
        private string $cne
    ) {
        parent::__construct($nom, $prenom, $dateNaissance, $villeNaissance, $cin);
    }

    public function getCne(): string {
        return $this->cne;
    }

    public function __toString(): string {
        return parent::__toString() . ' | CNE : ' . $this->cne;
    }
}

$etudiants = [
    new Etudiant("Hachimi", "Sara", "2003-05-14", "Marrakech", "EE123456", "CNE001"),
    new Etudiant("Amrani", "Youssef", "2002-11-03", "Rabat", "AB234567", "CNE002"),
    new Etudiant("Bennani", "Salma", "2004-02-20", "Fès", "CD345678", "CNE003"),
    new Etudiant("Alaoui", "Omar", "2001-08-09", "Agadir", "FG456789", "CNE004"),
    new Etudiant("Idrissi", "Meryem", "2003-12-01", "Tanger", "HI567890", "CNE005"),
];

foreach ($etudiants as $e) {
    echo $e . PHP_EOL;
}
