# gestion-des-formations-php
Gestion des formations des salariés de la Maison des Ligues


## Contexte
- Diplôme : BTS SIO
- Ecole : ITIC Paris
- Année : 2014/2015


## Enoncé
Création d'une plateforme de connexion et d'inscription à des formations 


## Arborescence des fichiers

### /
- index.php : page de connexion utilisateur
- gestion-des-formations-php.sql : fichier SQL de la base de données

### /commun
- /bootstrap : fichiers CSS et JS de la librairie Bootstrap et jQuery
- /class :
    - classeSQL.php : classe de toutes les requêtes SQL de l'application et connexion à la base de données
    - connexion.php : script de connexion de l'utilisateur
    - deconnexion.php : script de déconnexion de l'utilisateur
    - inscription.php : script d'inscription à une formation
    - modification_compte.php : script de modification des informations de l'utilisateur
- /fontawesome : fichiers CSS et Fonts de la librairie Fontawesome
- /image : images et guide PDF
- /include :
    - footer.php : footer des pages après la connexion de l'utilisateur
    - header.php : menu des pages après la connexion de l'utilisateur

### /formation
- compte_user.php : page des informations de l'utilisateur
- descriptif_formation.php : page des informations de la formation
- formations_user.php : pages des formations de l'utilisateur
- offres.php : pages des formations


## Utilisation

Guide d'utilisation de la plateforme en [PDF](commun/image/guide.pdf).

## Installation

1. Créez un fichier .env.php à la racine du dossier, copiez le code suivant et remplissez les informations de votre base de données :

``
    define('BDD_USER', ''); 
    define('BDD_PASSWORD', '');  
    define('BDD_HOST', '');  
    define('BDD_PORT', '');  
    define('BDD_NAME', 'gestion-des-formations-php');
``

2. Importez le fichier gestion-des-formations-php.sql dans votre base de données

3. Testez
    - login : admin
    - mot de passe : azerty


## Optimisations pour la V2
- Design
- Version en Symfony
- D'autres fonctionnalités : créer/modifier/supprimer des formations, créer/modifier/supprimer des utilisateurs, etc.