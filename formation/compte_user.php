<!-- ##################################################################

		PAGE DE MODIFICATION DES INFORMATIONS UTILISATEUR

#################################################################### -->


<!-- HEADER -->
<?php 
	include '../commun/include/header.php';
	$query = new ClassSQL();
	$query = $query->GetUtilisateur($_SESSION["id"]); 
?>

<!-- FORMULAIRE DE MODIFICATION -->
<div class="row">
	
	<form class="form-horizontal col-md-push-3 col-md-8" action='../commun/class/modification_compte.php' method='POST' name='formInfoUser'>
		
		<legend>Modification de vos informations personnelles</legend>
		
		<?php
			if(isset($_GET['erreur']))
				echo "<p> <font color='red'>".$_GET['erreur']."</font></p>";
		?>

		<div class="row">	
			<div class="form-group">	
				<label class="col-md-4">Nom :</label>
				<div class="col-md-4">
					<input class="form-control" type='text' id='nom' name='nom' value="<?php echo $query[0]['nom_utilisateur']; ?>">
				</div>
				
				<br><br>
				
				<label class="col-md-4">Prénom :</label>
				<div class="col-md-4">
					<input class="form-control" type='text' id='prenom' name='prenom' value="<?php echo $query[0]['prenom_utilisateur']; ?>">
				</div>
				
				<br><br>
						
				<label class="col-md-4">Login :</label>
				<div class="col-md-4">
					<input class="form-control" type='text' id='login' name='login' value="<?php echo $query[0]['login_utilisateur']; ?>">
				</div>
				
				<br><br>
				
				<label class="col-md-4">Ancien mot de passe :</label>
				<div class="col-md-4">
					<input class="form-control" type='password' id='ancien' name='ancien'>
				</div>
		
				<br><br>
						
				<label class="col-md-4">Nouveau mot de passe :</label>
				<div class="col-md-4">
					<input class="form-control" type='password' id='pw1' name='pw1'>
				</div>
				
				<br><br>
				
				<label class="col-md-4">Confirmation du mot de passe :</label>
				<div class="col-md-4">
					<input class="form-control" type='password' id='pw2' name='pw2'>
				</div>
				
				<br><br><br>
				
				<input type='hidden' id='id' name='id' value='<?php echo $_SESSION["id"]; ?>'>
			
				<div class="col-md-offsett-2 col-md-4">
					<button class="btn btn-primary" type='submit'>Modifier</button>
				</div>
			
			<!-- CLASS FORM-GROUP -->	
			</div>
										
		<!-- CLASS ROW -->
		</div>

	</form>
</div>

<!-- FOOTER -->
<?php include '../commun/include/footer.php'; ?>
