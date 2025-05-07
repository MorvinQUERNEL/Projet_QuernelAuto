# Projet_QuernelAuto
# QuernelAuto - Système de Gestion Automobile

## Installation

Pour installer et configurer la base de données de l'application QuernelAuto, veuillez suivre ces étapes :

1. Clonez ce dépôt dans votre environnement de développement local
2. Assurez-vous que votre serveur web (Apache, Nginx, etc.) et MySQL sont opérationnels
3. Configurez les paramètres de connexion à la base de données dans le fichier `includes/dbconnect.php`
4. Accédez à l'URL suivante pour initialiser la base de données :

   [http://localhost:8080/install/install.php](http://localhost:8080/install/install.php)

> **Note :** Si votre serveur utilise un port différent de 8080, veuillez ajuster l'URL en conséquence.

## Structure de la base de données

L'application utilise une base de données MySQL nommée "QuernelAuto" avec les tables suivantes :

- `client` - Informations sur les clients
- `demande` - Demandes faites par les clients
- `transaction` - Transactions financières
- `type_vehicule` - Types de véhicules disponibles
- `vehicule` - Informations détaillées sur les véhicules
- `photos` - Photos associées aux véhicules
- `frais` - Frais additionnels liés aux véhicules
- `dependre` - Table de relation entre demandes et types de véhicules

## Prérequis

- PHP 7.4 ou supérieur
- MySQL 5.7 ou supérieur
- Serveur web (Apache, Nginx, etc.)

## Contact

Pour toute question ou assistance, veuillez contacter l'équipe de développement.