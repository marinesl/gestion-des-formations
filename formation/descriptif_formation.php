<!-- ##################################################################

			PAGE DU DESCRIPTIF DE LA FORMATION
		
#################################################################### -->

	
<!-- HEAER -->
<?php include '../commun/include/header.php'; ?>

<!-- DESCRIPTIF DE LA FORMATION -->
<?php 
	$query = new ClassSQL();
	$id_formation = $_GET['id_formation'];
	$query = $query->GetDescriptifFormation($id_formation);
	for($i = 0 ; $i < count($query) ; $i++) {
	$nom = $query[$i]['nom_formation'];
	$link = "../commun/class/inscription.php?formation=".$id_formation."&user=".$_SESSION['id'];
?>
	<center>			
		<h1><?php echo $query[$i]['nom_formation']; ?>&nbsp;&nbsp;<button class='btn btn-primary' onclick="javascript:if(confirm('Voulez-vous vraiment participer à cette formation ?'))document.location.href='<?php echo $link; ?>'">S'inscrire</button></h1>	
		
		<h3>Contenu de la formation</h3>
		<p><?php echo $query[$i]['contenu_formation']; ?></p>
		
		<h3>Pré-requis</h3>
		<p>
		<?php 
			$query2 = new ClassSQL();
			$query2 = $query2->GetPrerequis($id_formation);
			for ($j = 0 ; $j < count($query2) ; $j++) {
				echo $query2[$j]['libelle_prerequis'];
				if (count($query2) > 1 && $j < count($query2) - 1)
					echo " ; ";
			} 
		?>
		</p>
		
		<h3>Durée</h3>
		<p><?php 
			$debut = new DateTime($query[$i]['date_debut_formation']);
			$fin = new DateTime($query[$i]['date_fin_formation']);
			$duree = $fin->diff($debut); 
			echo $duree->format('%a jours');
		?></p>
		
		<h3>Dates</h3>
		<p><?php echo $query[$i]['date_debut_formation']." à ".$query[0]['date_fin_formation'];?></p>
		
		<h3>Lieu</h3>
		<p><?php echo $query[$i]['lieu_formation']; ?></p>
		
		<h3>Prestataire</h3>
		<p><?php echo $query[$i]['prestataire_formation']; ?></p>
	
	</center>
	<?php } ?>
     
	<!-- FENETRE MODALE -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                    <h4 class="modal-title">Confirmation d'inscription</h4>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment participer � la formation : <?php echo $nom; ?></p>
                </div>
                <div class="modal-footer">
                	<button type="button" class="btn btn-primary">Participer</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

<!-- FOOTER -->
<?php include '../commun/include/footer.php'; ?>
