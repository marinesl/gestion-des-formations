<!-- ##################################################################

			PAGE DES OFFRES DE FORMATION
		
#################################################################### -->


	
<!-- HEADER -->
<?php include '../commun/include/header.php'; ?>

<!-- TABLEAU DES OFFRES -->
<div class="table-responsible">

	<table class="table table-striped">

		<?php 
			if(isset($_GET['message']))
				echo "<p><font color='red'>".$_GET['message']."</font></p>";
		?>
	
		<center><h2>Offres de formation</h2></center>
	
		<thead>
			<tr>
				<th>Nom</th>
				<th>Date de début de formation</th>
				<th>Date de fin de formation</th>
				<th>Lieu</th>
				<th>Prestataire</th>
			</tr>
		</thead>
		
		<tbody>
			<?php
				$query = new ClassSQL();
				$query= $query->GetOffres();
				for ($i = 0 ; $i < count($query) ; $i++) {
					if ($query[$i]['date_fin_formation'] > date('Y-m-d')) {
			?>
					<tr>
						<td><a href='descriptif_formation.php?id_formation=<?php echo $query[$i]['id_formation']; ?>'><?php echo $query[$i]['nom_formation']; ?></a></td>	
						<td><?php echo $query[$i]['date_debut_formation']; ?></td>
						<td><?php echo $query[$i]['date_fin_formation']; ?></td>
						<td><?php echo $query[$i]['lieu_formation']; ?></td>
						<td><?php echo $query[$i]['prestataire_formation']; ?></td>
					</tr>
			<?php 
					}
				}
			?>
		</tbody>
	</table>
	
</div>

<!-- FOOTER -->
<?php include '../commun/include/footer.php'; ?>



