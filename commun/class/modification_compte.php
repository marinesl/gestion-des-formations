<?php
	/* #####################################################################
	
				SCRIPT DE MODIFICATION DES DONNEES PERSONNELLES
	
	##################################################################### */

	// APPEL A LA CLASSE DE REQUETES SQL
	include 'classeSQL.php';
	$sql = new ClassSQL();
	$query = new ClassSQL();
	
	// RECUPERATION DES DONNEES
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$login = $_POST['login'];
	$ancien = $_POST['ancien'];
	$pw1 = $_POST['pw1'];
	$pw2 = $_POST['pw2'];
	$id = $_POST['id'];
	
	$error = "";
	
	$sql = $sql->GetUtilisateur($id);
	
	// SI LES CHAMPS NOM, PRENOM, LOGIN SONT REMPLIS
	// ALORS ON VERIFIE SI LES CHAMPS MOT DE PASSE NE SONT PAS VIDES
	if(!empty($nom) && !empty($prenom) && !empty($login)) {
		if($sql[0]['mdp_utilisateur'] != md5($ancien)) {
			$error = "L'ancien mot de passe est incorrect.";
		}
		else {
			if(!empty($pw1)) {
				if(!empty($pw2)) {
					// SI LES CHAMPS MOT DE PASSE NE SONT PAS IDENTIQUES
					// ALORS ON AFFICHE LE MESSAGE D'ERREUR
					if($pw1 != $pw2)
						$error = "Les mots de passe ne sont pas identiques.";
				}
				// SINON ON AFFICHE LE MESSAGE D'ERREUR
				else 
					$error = "Veuillez confirmer votre mot de passe.";
			}
			else {
				$error = "Veuillez préciser votre nouveau mot de passe.";
			}
		}
	}
	else 
		$error = "Il faut remplir tous les champs.";
	
	// SI $ERROR EST VIDE
	// ON EXECUTE LA REQUETE DE MODIFICATION
	if(empty($error)) {
		$query->UpdateUtilisateur($nom,$prenom,$login,$pw1,$id);
		$error = "Les modifications ont bien été enregistrées.";
	}
	
	header("location:../../formation/compte_user.php?erreur=".$error);
		
