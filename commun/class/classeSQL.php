<?php
/* #####################################################################

				CLASSE DE REQUETES SQL

##################################################################### */


	class ClassSQL 
	{
		
		// CONNEXION A LA BASE DE DONNEES
		function Connect()
		{
			$user = 'root';
			$pass = '';
			$hote = 'localhost';
			$port = '8080';
			$bdd = 'gestion_des_formations';
			$dsn = "mysql:$hote;port=$port;dbname=$bdd";
			
			/*$user = 'mlancelin';
			$pass = '05uluCM5';
			$hote = 'mysql.m2l.local';
			$port = '';
			$bdd = 'mlancelin';
			$dsn = "mysql:host=$hote;port=$port;dbname=$bdd";*/

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
			
			$sql = "SELECT nom_utilisateur,prenom_utilisateur,login_utilisateur,mdp_utilisateur
					FROM utilisateur 
					WHERE id_utilisateur=".$id;
			
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
				
			$sql = "SELECT id_formation,nom_formation,date_debut_formation,date_fin_formation,lieu_formation,prestataire_formation 
					FROM formation
					ORDER BY nom_formation";
				
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
			
			$sql = "SELECT nom_formation, contenu_formation, date_debut_formation, date_fin_formation, lieu_formation, prestataire_formation
					FROM formation
					WHERE formation.id_formation=".$id;
			
			$query = $dbh->query($sql);
			
			if ($query)
				return $query->fetchAll(PDO::FETCH_ASSOC);
			else
				return false;
		}
		
		// RETOURNE LES FORMATIONS AUXQUELLES L'UTILISATEUR EST INSCRIT
		function GetFormationsUser($id,$etat) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
				
			$sql = "SELECT *
					FROM formation,inscription
					WHERE inscription.id_formation=formation.id_formation
					AND inscription.id_utilisateur=".$id;
			
			if(!empty($etat))
					$sql .= " AND etat_inscription='".$etat."'";

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
		
			$sql = "SELECT id_utilisateur
					FROM utilisateur
					WHERE login_utilisateur='".$login."' and mdp_utilisateur='".$password."'";
		
			$query = $dbh->query($sql);
		
			if ($query)
				return $query->fetchAll(PDO::FETCH_ASSOC);
			else
				return false;
		}
		
		// MODIFIE LES INFORMATIONS DE L'UTILISATEUR
		function UpdateUtilisateur($nom,$prenom,$login,$mdp,$id) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
			
			$sql = "UPDATE utilisateur
					SET nom_utilisateur='".$nom."',prenom_utilisateur='".$prenom."',login_utilisateur='".$login."'";
					
			if(!empty($mdp))
				$sql .= ",mdp_utilisateur=md5('".$mdp."')";
			
			$sql .= " WHERE id_utilisateur=".$id;
			
			$query = $dbh->query($sql);
		}
		
		// CREE UNE INCRIPTION
		function InsertInscription($idUser,$idFormation) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
			
			$sql = "INSERT INTO inscription
					VALUES('Inscrit','".$idUser."','".$idFormation."')";
			
			$query = $dbh->query($sql);
		}
		
		// RETOURNE VRAI SI L'UTILISATEUR EST INSCRIT A LA FORMATION
		function GetInscription($user,$formation) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
			
			$sql = "SELECT COUNT(*) AS insc
					FROM inscription
					WHERE id_formation=".$formation." 
					AND id_utilisateur=".$user;			
			
			$query = $dbh->query($sql);
			$resultat = $query->fetchAll(PDO::FETCH_ASSOC);
			
			if ($resultat[0]["insc"] == 0)
				return false;
			else
				return true;
		}
		
		// MODIFIE L'ETAT DE LA FORMATION -> EN COURS
		function UpdateFormationEnCourt($user,$formation) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
			
			$sql = "UPDATE inscription
					SET etat_inscription='En court'
					WHERE id_formation=".$formation."
					AND id_utilisateur=".$user;
			
			$query = $dbh->query($sql);
		}
		
		// MODIFIE L'ETAT DE LA FORMATION -> TERMINE
		function UpdateFormationTermine($user,$formation) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
				
			$sql = "UPDATE inscription
					SET etat_inscription='Terminé'
					WHERE id_formation=".$formation."
					AND id_utilisateur=".$user;

			$query = $dbh->query($sql);
		}
		
		// RETOURNE LES INFORMATIONS DE LA FORMATION
		function GetPrerequis($id) {
			// CONNEXION A LA BASE DE DONNEES
			$dbh = $this->Connect();
				
			$sql = "SELECT libelle_prerequis
					FROM prerequis,demande
					WHERE demande.id_formation=".$id."
					AND prerequis.id_prerequis=demande.id_prerequis";
			
			$query = $dbh->query($sql);
				
			if ($query)
				return $query->fetchAll(PDO::FETCH_ASSOC);
			else
				return false;
		}

	}

?>