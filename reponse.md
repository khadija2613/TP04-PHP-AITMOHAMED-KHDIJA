# Réponses - TP 4 POO PHP
## Partie 0
3- $v1 et $v2 ne partagent pas la même marque car ce sont deux objets (instances) séparés en mémoire. Modifier l'un ne change pas l'autre.
## Partie 1
1.1- ça génère une erreur on ne peut pas afficher $cin, $dateNaissance ni appeler getAge() car ils sont déclarés en private.
1.2- Ce serait risqué car n'importe quel code extérieur pourrait modifier ou effacer le CIN sans aucun contrôle.
1.3- Non, elle n'est pas inutile : elle sert en interne à la classe (par exemple pour être appelée par d'autres méthodes sans être exposée dehors).
1.4- Non, depuis l'extérieur ça ne change rien (toujours inaccessible). Par contre, les classes filles pourraient y accéder.
## Partie 2
2.1.a- new Voiture("Noire") fonctionne (la vitesse prend sa valeur par défaut 0). Par contre new Voiture(120) provoque une erreur de type car le premier argument attend un texte (string) et non un nombre.
2.1.b- Ça évite de réécrire les propriétés en haut et de faire les assignations une par une dans le constructeur. C'est plus court.
2.2.b- On utilise un seul constructeur avec des valeurs par défaut pour les paramètres facultatifs.
2.3- L'ordre d'affichage suit la création, puis la destruction manuelle via unset(), et enfin la fin du script pour les objets restants (du dernier créé au premier).
## Partie 3
3.2-sans __set, PHP bloque ou crée une propriété publique à la volée avec __set, on intercepte l'écriture.
3.3- Oui, si on ne met pas de conditions, __set peut casser l'encapsulation. Il faut donc ajouter des vérifications (comme strlen) et bloquer les valeurs incorrectes avec une exception.
3.4-Fait dans le code avec la vérification de la taille du nom.

## Partie 4
4.1-getAge() est privée, mais elle marche ici car elle est appelée de l'intérieur de la classe elle-même.
4.2-PHP déclenche une erreur de type car __toString() doit obligatoirement retourner une chaîne de caractères (string).
4.3- Ça permet d'afficher directement l'objet avec un simple echo $obj sans avoir à appeler une méthode spécifique (comme getName()).

## Partie 5
5.1 et 5.2-Sans __serialize, le mot de passe s'affiche en clair dans la chaîne sérialisée, ce qui pose un gros problème de sécurité.
5.3- Le mot de passe devient une chaîne vide (""). Dans une vraie appli, il faudrait le gérer proprement ou ne jamais l'exposer.


## Partie 6
6.1.b- Non, on ne peut pas appeler miauler() sur un Chien car cette méthode appartient à la classe Chat, pas à Chien
6.2.a- Sans parent::__construct($nom), le nom n'est pas initialisé dans la classe mère, ce qui provoque une erreur.
6.2.b-$nom est protected pour que la classe fille (Etudiant) puisse y accéder, tout en restant cachée du monde extérieur.
6.3.a- Redéfinir une méthode final, hériter d'une classe final, ou modifier un readonly provoquent tous des erreurs bloquantes.
6.4.c-ça évite de réécrire le même code d'affichage et ça reste propre.

## Partie 7
7.4-code corrigé avec les types (float) et le formatage des nombres.