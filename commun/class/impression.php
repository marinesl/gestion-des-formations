<?php
/* #####################################################################

					SCRIPT D'IMPRESSION PDF

##################################################################### */

	// APPEL A LA CLASSE FPDF
	require '../fpdf/fpdf.php';
	include 'classeSQL.php';
	
	// CREATION DES OBJETS
	$pdf = new FPDF('L');
	$sql = new ClassSQL();
	
	// RECUPERATION DES DONNEES
	$id = $_GET['id'];
	
	// RECUPERATION DES FORMATIONS DE L'UTILISATEUR
	$formation = array();
	$sql = $sql->GetFormationsUser($id);
	for($i = 0 ; $i < count($sql) ; $i++) {
		$formation[$i] = $sql[$i]['nom_formation'].",".$sql[$i]['date_debut_formation']." ".$sql[$i]['date_fin_formation'].",
						".$sql[$i]['lieu_formation'].",".$sql[$i]['etat_inscription']; 
		//echo $formation[$i];
	}
	
	// CREATION DE L'ENTETE DU TABLEAU
	$header = array('Nom','Dates','Lieu','Etat');
	
	// CREATION DES DONNEES DU TABLEAU^
	$data = array();
	foreach($formation as $line)
		$data[] = explode(',',trim($line));
	
	$pdf->Open();
	
	$pdf->SetFont('Arial');
	
	$pdf->AddPage();
	
	// AJOUT DE L'ENTETE ET DES DONNEES
	foreach($header as $col)
		$pdf->Cell(80,7,$col,1);
	$pdf->Ln();
	foreach($data as $row)
	{
		foreach($row as $col)
			$pdf->Cell(80,6,$col,1);
		$pdf->Ln();
	}
	
	$pdf->Output();