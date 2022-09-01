<!-- ##################################################################

		PAGE DES FORMATIONS AUXQUELLES EST INSCRIT L'UTILISATEUR
		
#################################################################### -->

<?php 
	// HEADER 
	include '../commun/include/header.php'; 
	$query = new ClassSQL();
	
	// MODIFICATION DE L'ETAT DES FORMATIONS DE L'UTILISATEUR
	$query = $query->GetFormationsUser($_SESSION['id'],"");
	for($i = 0 ; $i < count($query) ; $i++) {
		// SI LA DATE DE DEBUT EST PASSEE ET PAS LA DATE DE FIN
		// ALORS ON MODIFIE L'ETAT DE LA FORMATION PAR 'EN COURS'
		if($query[$i]['date_debut_formation'] < date('Y-m-d') && $query[$i]['date_fin_formation'] > date('Y-m-d')) {
			$update1 = new ClassSQL();
			$update1 = $update1->UpdateFormationEnCourt($_SESSION['id'], $query[$i]['id_formation']);
		}
		// SI LA DATE DE FIN EST PASSEE
		// ALORS ON MODIFIE L'ETAT DE LA FORMATION PAR 'TERMINE'
		if($query[$i]['date_fin_formation'] < date('Y-m-d')) {
			$update2 = new ClassSQL();
			$update2 = $update2->UpdateFormationTermine($_SESSION['id'], $query[$i]['id_formation']);
		}
	}
	
	
	
?>
<div class="row">
	<form class="form-horizontal col-md-push-3 col-md-8" action="#" method="post">
		<div class="row">	
			<div class="form-group">
				<div class="row">
				<label class="col-md-3">Etat de formation : </label>		
				<select name="etat" class="col-md-2">
					<option>Inscrit</option>
					<option>En court</option>
					<option>Terminée</option>
				</select>
				&nbsp;&nbsp;
				<button class="btn btn-primary">Valider</button>
				</div>		
			</div>
		</div>
	</form>
</div>

<br>

<?php 
	if(isset($_POST['etat'])) {
		$requete = new ClassSQL();
		$requete = $requete->GetFormationsUser($_SESSION['id'],$_POST['etat']);
		if(count($requete) == 0) {
			echo "<br><center><p><h2><font color='red'>Aucune formation trouvée.</font></h2></p></center><br><br><br>";
		}
		else {
			
?>

<!-- TABLEAU DES FORMATIONS DE L'UTILISATEUR -->
<div class="table-responsible">
	<table class="table table-striped">
		
		<center><h2>Mes formations</h2></center>
						
		<thead>
			<tr>
				<th>Nom</th>
				<th>Date de début</th>
				<th>Date de fin</th>
				<th>Lieu</th>
				<th>Etat</th>
			</tr>
		</thead>
		
		<tbody>			
			<?php 
				for($i = 0 ; $i < count($requete) ; $i++) {

					$tab_date_debut = explode('-',$requete[$i]['date_debut_formation']);
					$date_debut = $tab_date_debut[2]."/".$tab_date_debut[1]."/".$tab_date_debut[0];
					
					$tab_date_fin = explode('-',$requete[$i]['date_fin_formation']);
					$date_fin = $tab_date_fin[2]."/".$tab_date_fin[1]."/".$tab_date_fin[0];
			?>
				<tr>
					<td><?php echo $requete[$i]['nom_formation']; ?></td>
					<td><?php echo $date_debut; ?></td>
					<td><?php echo $date_fin; ?></td>
					<td><?php echo $requete[$i]['lieu_formation']; ?></td>
					<td><font color='red'><?php echo $requete[$i]['etat_inscription']; ?></font></td>
				</tr>
			<?php 
				}
			?>
		</tbody>
		
	</table>
</div>

<?php 
		}
	}
?>

<!-- IMPRESSION EN PDF
<?php $link = "../commun/class/impression.php?id=".$_SESSION['id']; ?>
<a class="btn btn-default" href="<?php echo $link; ?>">Imprimer en PDF</a> -->

<!-- FOOTER -->
<?php include '../commun/include/footer.php'; ?>
	

	
