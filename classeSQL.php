<?php

	/*
	* Classe requêtes SQL
	*/


	class ClassSQL 
	{
		
		// CONNEXION A LA BASE DE DONNEES
		function Connect()
		{
			$user = 'mlancelin';
			$pass = '05uluCM5';
			$hote = 'mysql.m2l.local';
			$port = '';
			$bdd = 'mlancelin';
			$dsn = "mysql:host=$hote;port=$port;dbname=$bdd";

			try
			{
				$dbh = new PDO($dsn, $user, $pass);
				$dbh->exec("set character set utf8");
					
			}
			catch (PDOException $e)
			{
				die("Erreur! :" . $e->getMessage());
			}

			return $dbh;
		}
		
		// RETOURNE LE NOM, LE PRENOM, LE LOGIN ET LE MOT DE PASSE DE L'UTILISATEUR
		function GetUtilisateur($id) {
			
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
			
			$sql = "select nom_utilisateur,prenom_utilisateur,login_utilisateur,mdp_utilisateur
					from utilisateur 
					where id_utilisateur=".$id;
			
			$query = $dbh->query($sql);
			
			if ($query)
				return $query->fetchAll(PDO::FETCH_ASSOC);
			else
				return false;
		}
		
		// RETOURNE LES FORMATIONS DISPONIBLES
		function GetOffres() {
			
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
				
			$sql = "select id_formation,nom_formation,date_debut_formation,date_fin_formation,lieu_formation,prestataire_formation 
					from formation";
				
			$query = $dbh->query($sql);
				
			if ($query)
				return $query->fetchAll(PDO::FETCH_ASSOC);
			else
				return false;
		}
		
		// RETOURNE LES INFORMATIONS DE LA FORMATION
		function GetDescriptifFormation($id) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
			
			$sql = "select nom_formation, contenu_formation, date_debut_formation, date_fin_formation, lieu_formation, prestataire_formation
					from formation
					where id_formation=".$id;
			
			$query = $dbh->query($sql);
			
			if ($query)
				return $query->fetchAll(PDO::FETCH_ASSOC);
			else
				return false;
		}
		
		// RETOURNE LES FORMATIONS AUXQUELLES L'UTILISATEUR EST INSCRIT
		function GetFormationsUser() {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
				
			$sql = "select nom_formation,date_debut_formation,date_fin_formation,lieu_formation,etat
					from formation,inscription
					where inscription.id_formation=formation.id_formation";
				
			$query = $dbh->query($sql);
				
			if ($query)
				return $query->fetchAll(PDO::FETCH_ASSOC);
			else
				return false;
		}
		
		// RETOURNE ID_UTILISATEUR POUR LA CONNEXION
		function GetConnexion($login,$password) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
		
			$sql = "select id_utilisateur
					from utilisateur
					where login_utilisateur='".$login."' and mdp_utilisateur='".$password."'";
		
			$query = $dbh->query($sql);
		
			if ($query)
				return $query->fetchAll(PDO::FETCH_ASSOC);
			else
				return false;
		}

	}

?>