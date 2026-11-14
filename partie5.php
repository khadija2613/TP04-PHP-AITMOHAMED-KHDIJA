<?php

class Utilisateur {
    public string $nom;
    public int $age;
    private string $motDePasse;

    public function __construct(string $nom, int $age, string $motDePasse) {
        $this->nom = $nom;
        $this->age = $age;
        $this->motDePasse = $motDePasse;
    }

    public function __serialize(): array {
        return [
            'nom' => $this->nom,
            'age' => $this->age,
            // Le mot de passe est volontairement exclu.
        ];
    }

    public function __unserialize(array $data): void {
        $this->nom = (string) ($data['nom'] ?? '');
        $this->age = (int) ($data['age'] ?? 0);
        $this->motDePasse = '';
    }
}

$u = new Utilisateur("Alice", 25, "secret123");
$serialise = serialize($u);
echo "Sérialisé : $serialise" . PHP_EOL;
echo "Le mot de passe apparaît-il ? "
    . (str_contains($serialise, 'secret123') ? 'oui' : 'non')
    . PHP_EOL;

$restaure = unserialize($serialise);
var_dump($restaure);

// Pour des données d'entrée utilisateur, préférez JSON et validez les champs.
$json = json_encode(['nom' => 'Alice', 'age' => 25], JSON_THROW_ON_ERROR);
$donnees = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
var_dump($donnees);
