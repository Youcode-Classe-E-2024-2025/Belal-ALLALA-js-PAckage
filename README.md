Gestion des Packages JavaScript
Ce projet est une application web permettant de gérer les packages JavaScript, leurs versions, et les auteurs qui y contribuent. Il facilite la gestion, la recherche et la modification des données via une interface backend simple et efficace.

📋 Fonctionnalités principales
Gestion des auteurs :

Ajouter, modifier et supprimer des auteurs.
Lister tous les auteurs disponibles.
Gestion des packages :

Ajouter, modifier et supprimer des packages.
Associer des auteurs à des packages via des collaborations.
Gestion des versions :

Ajouter des versions pour chaque package.
Afficher l'historique des versions pour un package.
Recherche et affichage :

Rechercher des packages par mot-clé ou par auteur.
Afficher les packages et leurs relations (auteurs, collaborations, versions).
🗂️ Structure du projet
/config : Fichier de configuration de la base de données.
/php :
authors : Scripts pour gérer les auteurs (ajout, modification, suppression).
packages : Scripts pour gérer les packages (ajout, modification, suppression).
versions : Scripts pour gérer les versions des packages.
/templates : En-têtes, pieds de page et styles globaux.
index.php : Page d'accueil.
README.md : Documentation du projet.
💾 Installation et configuration
Prérequis
Serveur local : Laragon, XAMPP ou WAMP.
PHP : Version 7.4 ou supérieure.
Base de données : MySQL ou MariaDB.
Étapes d'installation
Clonez le projet :
bash
نسخ الكود
git clone https://github.com/votre-utilisateur/gestion-packages-js.git
Configurez la base de données :
Importez le fichier database.sql dans votre serveur MySQL.
Modifiez /config/database.php avec vos paramètres de connexion :
php
نسخ الكود
$host = 'localhost';
$dbname = 'js_package_manager';
$username = 'root';
$password = '';
Lancez le serveur local et accédez à l'URL suivante :
arduino
نسخ الكود
http://localhost/gestion-packages-js
🛠️ Scripts SQL inclus
Création des tables (authors, packages, versions, collaborations).
Relations définies avec des clés étrangères.
Requêtes pour ajouter, modifier, supprimer et afficher des données.
Exemples de jointures entre les tables.
📈 Diagrammes
ERD (Schéma relationnel) : Présente les entités et leurs relations.
<!-- UML (Cas d'utilisation) : Décrit les interactions entre les acteurs et le système. -->
Les diagrammes sont disponibles dans le dossier /docs.

📜 Licence
Ce projet est distribué sous la licence MIT. Vous êtes libre de l'utiliser et de le 


