---
title: "Cadavrekski - Instructions"
author: "[Pascal Hurni](mailto:phi@cpnv.ch)"
date:
- août 2021
signature: CPNV - PHI
banner: ES Info OnBoarding
---

## Contexte

Vous recevez un petit logiciel qui permet de jouer à une variante de [Cadavre exquis](https://fr.wikipedia.org/wiki/Cadavre_exquis).
Il permet donc de créer une petite histoire à partir de fragments (lignes) saisi par plusieurs intervenants à tour de rôle.

Le logiciel s'utilise depuis un terminal.

Pour ajouter une ligne à l'histoire, il suffit d'en passer le texte dans le 1er argument sur la ligne de commande, exemple:

```sh
$ php Cadavrekski.php "Car je suis superman"
```

Pour afficher l'histoire complète, lancez le logiciel sans argument, exemple:

```sh
$ php Cadavrekski.php
Le grain de riz arrive
Et dans le sable je reste
Car je suis superman
```

## Installation

Pour faire fonctionner ce logiciel, il faut:

 - PHP (7 ou 8)
 - MySQL (ou MariaDB)

Le logiciel stocke les lignes dans une base de donnée MySQL. Vous recevez un _dump_ de la base dans `Cadavrekski.sql`.
Importez cette base.

## Exigences

Le but de cet exercice est de prendre en main le logiciel existant et de le modifier pour respecter les exigences
suivantes.

Vous ferez en sorte de réaliser les modifications selon les meilleures normes de qualités que vous connaissez.

### Stockage dans un fichier

Le code actuel stocke les lignes de l'histoire dans une BD. Faites en sorte que le logiciel puisse aussi (il ne
faut donc pas supprimer le stockage dans la BD) utiliser un simple fichier texte comme stockage.

Le choix du type de stockage sera fait par l'utilisateur, pour effectuer ce choix utiliser le moyen qui vous convient.

### Affichage centré

Les _cadavres exquis_ sont plus joli lorsque le texte de chaque ligne est centré.
Vous allez modifier votre code pour que ce soit le cas. Attention: prenez en compte la largeur du terminal.

