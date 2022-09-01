<?php
	/* #####################################################################

					SCRIPT DE CONNEXION

	##################################################################### */

	session_start();

	// APPEL A LA CLASSE DE REQUETES SQL
	include 'classeSQL.php';
	$sql = new ClassSQL();

	// RECUPERATION DES DONNEES
	$login = $_POST['login'];
	$password = $_POST['pw'];
	$password = md5($password);

	$result = false;

	// SI LES CHAMPS SONT REMPLIS
	// ALORS ON CHERCHE SI LE LOGIN EST CORRECT
	if($login != "" && $password != "") {
		$sql = $sql->GetConnexion($login,$password);

		// SI LA REQUETE RENVOIE UN RESULTAT
		// ALORS LA VARIABLE $RESULT DEVIENT TRUE
		if(count($sql) == 1) {
			$result = true;
		}
		// SINON ON RENVOIE LE MESSAGE D'ERREUR
		else {
			$error = "Login ou mot de passe incorrect.";
		}
	}
	// SINON ON RENVOIE LE MESSAGE D'ERREUR
	else {
		$error = "Vous devez remplir tous les champs.";
	}


	// SI LA VARIABLE $RESULT=FALSE
	// ALORS ON REDIRIGE VERS INDEX.PHP EN AFFICHANT LE MESSAGE D'ERREUR
	if ($result == false) {
		header('location:../../index.php?message='.$error);
	}
	// SINON ON REDIRIGE VERS LA PAGE FORMATIONS_USER.PHP AVEC L'ID UTILISATEUR
	else {
		$_SESSION['id'] = $sql[0]['id_utilisateur'];
		header('location:../../formation/formations_user.php');
	}

?>