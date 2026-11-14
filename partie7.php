<?php

class Compte {
    private float $montant;
    private float $interet;

    public function __construct(float $montantInitial, float $interet) {
        $this->montant = $montantInitial;
        $this->interet = $interet;
    }

    public function get_montant(): float {
        return $this->montant;
    }

    public function un_an(): void {
        $this->montant *= 1 + ($this->interet / 100);
    }
}

$c1 = new Compte(400.0, 10.0);
$c2 = new Compte(2500.0, 5.0);

for ($i = 1; $i <= 10; $i++) {
    $c1->un_an();
    $c2->un_an();
}

echo '<p>Valeur du compte = '
    . number_format($c1->get_montant(), 2, ',', ' ')
    . ' dirhams</p>' . PHP_EOL;
echo '<p>Valeur du compte = '
    . number_format($c2->get_montant(), 2, ',', ' ')
    . ' dirhams</p>' . PHP_EOL;
