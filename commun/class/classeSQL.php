<?php
/* #####################################################################

				CLASSE DE REQUETES SQL

##################################################################### */

require __DIR__.'/../../.env.php';

class ClassSQL 
{

	/**
	 * CONNEXION A LA BASE DE DONNEES
	 */
	function Connect() {
		$user = BDD_USER;
		$pass = BDD_PASSWORD;
		$hote = BDD_HOST;
		$port = BDD_PORT;
		$bdd = BDD_NAME;
		$dsn = "mysql:$hote;port=$port;dbname=$bdd";

		try {
			$dbh = new PDO($dsn, $user, $pass);
			$dbh->exec("set character set utf8");	
		} catch (PDOException $e) {
			die("Erreur! :" . $e->getMessage());
		}

		return $dbh;
	}


	/******************
	 * UTILISATEUR
	 ******************/
	

	/**
	 * RETOURNE LE NOM, LE PRENOM, LE LOGIN ET LE MOT DE PASSE DE L'UTILISATEUR
	 * @param id identifiant de l'utilisateur
	 */
	function GetUtilisateur($id) {
		// CONNEXION A LA BASE DE DONNEES
		$dbh = $this->Connect();
		
		$sql = "SELECT nom_utilisateur,prenom_utilisateur,login_utilisateur,mdp_utilisateur
				FROM utilisateur 
				WHERE id_utilisateur=".$id;
		
		$query = $dbh->query($sql);
		
		return ($query) ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
	}


	/**
	 * RETOURNE ID_UTILISATEUR POUR LA CONNEXION
	 * @param login identifiant de l'utilisation
	 * @param password mot de passe de l'utilisateur
	 */
	function GetConnexion($login, $password) {
		// CONNEXION A LA BASE DE DONNEES
		$dbh = $this->Connect();
	
		$sql = "SELECT id_utilisateur
				FROM utilisateur
				WHERE login_utilisateur='".$login."' and mdp_utilisateur='".$password."'";
	
		$query = $dbh->query($sql);
	
		return ($query) ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
	}


	/**
	 * MODIFIE LES INFORMATIONS DE L'UTILISATEUR
	 * @param nom le nom de l'utilisateur
	 * @param prenom le prénom de l'utilisateur
	 * @param login l'identifiant de connexion de l'utilisateur
	 * @param mdp le mot de passe de l'utilisateur
	 * @param id l'identifiant bdd de l'utilisateur
	 */
	function UpdateUtilisateur($nom, $prenom, $login, $mdp, $id) {
		// CONNEXION A LA BASE DE DONNEES
		$dbh = $this->Connect();
		
		$sql = "UPDATE utilisateur
				SET nom_utilisateur='".$nom."',prenom_utilisateur='".$prenom."',login_utilisateur='".$login."'";
				
		if(!empty($mdp))
			$sql .= ",mdp_utilisateur=md5('".$mdp."')";
		
		$sql .= " WHERE id_utilisateur=".$id;
		
		$query = $dbh->query($sql);
	}


	/******************
	 * OFFRES
	 ******************/
	

	/**
	 * RETOURNE LES FORMATIONS DISPONIBLES
	 */
	function GetOffres() {
		// CONNEXION A LA BASE DE DONNEES
		$dbh = $this->Connect();
			
		$sql = "SELECT id_formation,nom_formation,date_debut_formation,date_fin_formation,lieu_formation,prestataire_formation 
				FROM formation
				ORDER BY nom_formation";
			
		$query = $dbh->query($sql);
			
		return ($query) ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
	}


	/******************
	 * FORMATIONS
	 ******************/
	

	/**
	 * RETOURNE LES INFORMATIONS DE LA FORMATION
	 * @param id identifiant de la formation
	 */
	function GetDescriptifFormation($id) {
		// CONNEXION A LA BASE DE DONNEES
		$dbh = $this->Connect();
		
		$sql = "SELECT nom_formation, contenu_formation, date_debut_formation, date_fin_formation, lieu_formation, prestataire_formation
				FROM formation
				WHERE formation.id_formation=".$id;
		
		$query = $dbh->query($sql);
		
		return ($query) ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
	}
	

	/**
	 * RETOURNE LES FORMATIONS AUXQUELLES L'UTILISATEUR EST INSCRIT
	 * @param id identifiant de la formation
	 * @param etat etat de l'inscription
	 */
	function GetFormationsUser($id, $etat) {
		// CONNEXION A LA BASE DE DONNEES
		$dbh = $this->Connect();
			
		$sql = "SELECT *
				FROM formation,inscription
				WHERE inscription.id_formation=formation.id_formation
				AND inscription.id_utilisateur=".$id;
		
		if(!empty($etat))
				$sql .= " AND inscription.etat_inscription='".$etat."'";

		$query = $dbh->query($sql);
			
		return ($query) ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
	}


	/**
	 * MODIFIE L'ETAT DE LA FORMATION -> EN COURS
	 * @param user l'identifiant de l'utilisateur
	 * @param formation l'identifiant de la formation
	 */
	function UpdateFormationEnCours($user, $formation) {
		// CONNEXION A LA BASE DE DONNEES
		$dbh = $this->Connect();
		
		$sql = "UPDATE inscription
				SET etat_inscription='En cours'
				WHERE id_formation=".$formation."
				AND id_utilisateur=".$user;
		
		$query = $dbh->query($sql);
	}
	

	/**
	 * MODIFIE L'ETAT DE LA FORMATION -> TERMINE
	 * @param user l'identifiant de l'utilisateur
	 * @param formation l'identifiant de la formation
	 */
	function UpdateFormationTerminee($user, $formation) {
		// CONNEXION A LA BASE DE DONNEES
		$dbh = $this->Connect();
			
		$sql = "UPDATE inscription
				SET etat_inscription='Terminée'
				WHERE id_formation=".$formation." AND id_utilisateur=".$user;

		$query = $dbh->query($sql);
	}
	

	/******************
	 * INSCRIPTION
	 ******************/
	

	/**
	 * CREE UNE INCRIPTION
	 * @param idUser l'identifiant de l'utilisateur
	 * @param idFormation l'identifiant de la formation
	 */
	function InsertInscription($idUser, $idFormation) {
		// CONNEXION A LA BASE DE DONNEES
		$dbh = $this->Connect();
		
		$sql = "INSERT INTO inscription
				VALUES('Inscrit','".$idUser."','".$idFormation."')";
		
		$query = $dbh->query($sql);
	}
	

	/**
	 * RETOURNE VRAI SI L'UTILISATEUR EST INSCRIT A LA FORMATION
	 * @param user l'identifiant de l'utilisateur
	 * @param formation l'identifiant de la formation
	 */
	function GetInscription($user, $formation) {
		// CONNEXION A LA BASE DE DONNEES
		$dbh = $this->Connect();
		
		$sql = "SELECT COUNT(*) AS insc
				FROM inscription
				WHERE id_formation=".$formation." AND id_utilisateur=".$user;			
		
		$query = $dbh->query($sql);
		$resultat = $query->fetchAll(PDO::FETCH_ASSOC);
		
		return ($resultat[0]["insc"] == 0) ? false : true;
	}
	

	/******************
	 * PREREQUIS
	 ******************/
	

	/**
	 * RETOURNE LES INFORMATIONS DE LA FORMATION
	 * @param l'identifiant de la formation
	 */
	function GetPrerequis($id) {
		// CONNEXION A LA BASE DE DONNEES
		$dbh = $this->Connect();
			
		$sql = "SELECT libelle_prerequis
				FROM prerequis,demande
				WHERE demande.id_formation=".$id." AND prerequis.id_prerequis=demande.id_prerequis";
		
		$query = $dbh->query($sql);
			
		return ($query) ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
	}
}