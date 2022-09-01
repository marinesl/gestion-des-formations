<?php
/* #####################################################################

					SCRIPT D'INSCRIPTION

##################################################################### */

	// APPEL DE LA CLASSE DE REQUETES SQL
	include 'classeSQL.php';
	$query = new ClassSQL();
	
	// RECUPERATION DES DONNEES
	$id_formation = $_GET['formation'];
	$id_user = $_GET['user'];
	
	$res = $query->GetInscription($id_user, $id_formation);
	
	// SI L'UTILISATEUR N'EST PAS ENCORE INSCRIT A LA FORMATION
	// ALORS ON CREE UNE INSCRIPTION
	if($res != 1) {
		$sql = new ClassSQL();
		$sql = $sql->InsertInscription($id_user,$id_formation);
		header('location:../../formation/formations_user.php');
	}
	// SINON ON RETOURNE A OFFRES.PHP 
	// ET ON AFFICHE UN MESSAGE
	else {
		$message = "Vous êtes déjà inscrit à cette formation.";
		header('location:../../formation/offres.php?message='.$message);
	}
		
?>
	