# gestion-des-formations-php
Gestion des formations des salariés de la Maison des Ligues

## Contexte
- Diplôme : BTS SIO
- Ecole : ITIC Paris
- Intervenant : Projet de fin d'année
- Année : 2014/2015

## Enoncé
Créer une application simple de création, modification des formations d'une association sportive  


_______

Back office 

utilisation de Bootstrap

## Fichiers :
- index.php : page de connexion utilisateur
-- TODO:
- commun/class/classeSQL.php : classe PHP avec les requêtes SQL avec la connexion à la base de données (Connect()), récupérer un utilisateur (GetUtilisateur()), récupérer les formations (GetOffres()), récupérer une formation (GetDescriptifFormation()), récupèrer les formations de l'utilisateur (GetFormationsUser()) et récupère l'identifiant de l'utilisateur à la connexion (GetConnexion())


## Utilisation :

1. Page de connexion avec login et mot de passe :
admin - azerty
2. Une fois connecté, l'utilisateur est redirigé vers la page de ses formations et il peut les filtrer par état : Inscrit / En cours / Terminée (page Mes formations)
3. Page Offres : la liste des formations proposées, au clic on ouvre la page des informations de la formation et un bouton d'inscription
4. Page Mon compte : pour modifier les informations de compte utilisateur

TODO: lien du pdf
