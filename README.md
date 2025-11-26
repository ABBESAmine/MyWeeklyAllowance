# MyWeeklyAllowance

Module PHP de gestion d’argent de poche pour adolescents, développé en **TDD** et testé avec **PHPUnit 12**.

L’idée du projet vient d’un exercice de formation : concevoir une petite API orientée objet pour gérer un “porte-monnaie virtuel” pour ados, avec une couverture de tests unitaires à 100 %.

---

## Fonctionnalités

La classe principale est `TeenAccount` :

- Création d’un compte pour un ado (avec un nom).
- Solde initial à `0`.
- Dépôt d’argent.
- Dépense d’argent avec libellé.
- Configuration d’une allocation hebdomadaire.
- Application de l’allocation hebdomadaire au solde.

### Règles métier implémentées

- Impossible de déposer un montant négatif (lève une exception).
- Impossible de dépenser un montant négatif (lève une exception).
- Impossible de dépenser plus que le solde disponible (lève une exception).
- Impossible d’appliquer l’allocation hebdomadaire si elle n’a pas été configurée (lève une `LogicException`).

---

## Prérequis

- PHP **8.3** (ou version compatible avec PHPUnit 12).
- [Composer](https://getcomposer.org/).
- Une extension de couverture de code :
  - **Xdebug** avec au moins `xdebug.mode=coverage`, **ou**
  - **PCOV** activé.

---

## Installation

Cloner le dépôt :

```bash
git clone https://github.com/<ton-user>/MyWeeklyAllowance.git
cd MyWeeklyAllowance
```

Installer les dépendances :

```bash
composer install
```

---

## Structure du projet

```text
.
├── src/
│   └── TeenAccount.php              # Classe métier principale
├── tests/
│   └── MyWeeklyAllowanceTest.php    # Tests unitaires PHPUnit
├── composer.json
├── composer.lock
├── phpunit.xml                      # Configuration PHPUnit (tests + couverture)
├── .gitignore
└── README.md
```

---

## Exécution des tests

Lancer tous les tests unitaires :

```bash
vendor/bin/phpunit
```

Par défaut, PHPUnit utilise la configuration définie dans `phpunit.xml` (bootstrap, répertoire `tests`, etc.).

---

## Couverture de code

Générer un rapport de couverture HTML :

```bash
vendor/bin/phpunit --coverage-html coverage
```

Puis ouvrir dans un navigateur :

```text
coverage/index.html
```

Le projet est configuré pour mesurer la couverture sur les fichiers du dossier `src/`.  
Actuellement, la classe `TeenAccount` est couverte à **100 %** par les tests.

> Le dossier `coverage/` est ignoré par Git via `.gitignore` car c’est un artefact généré.

---

## TDD dans ce projet

Le développement a suivi le cycle classique **TDD** :

1. **Red** : écriture des tests unitaires (`MyWeeklyAllowanceTest`) avant le code.
2. **Green** : implémentation minimale dans `TeenAccount` pour faire passer les tests.
3. **Refactor** : nettoyage et amélioration du code en gardant tous les tests au vert.
4. **Coverage** : vérification de la couverture complète du module avec PHPUnit.

---

## Notes pour la formation

Ce projet sert de support pour :

- S’entrainer à écrire des tests unitaires avec PHPUnit.
- Mettre en place un autoload PSR-4 (namespace `Abbesamine\MyWeeklyAllowance\` pointant vers `src/`).
- Configurer `phpunit.xml` avec un bloc `<source>` pour la couverture.
- Comprendre la différence entre :
  - code source (`src/`),
  - tests (`tests/`),
  - artefacts générés (`coverage/`, `.phpunit.result.cache`, etc.).

---

## Licence

Projet pédagogique, librement réutilisable pour l’apprentissage des tests unitaires, de TDD et de PHPUnit.
