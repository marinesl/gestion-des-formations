<!-- ##################################################################

			PAGE DE CONNEXION 
		
#################################################################### -->

<!DOCTYPE html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gestion des formations PHP | Connexion</title>

	<!-- BOOTSTRAP -->
	<link href="commun/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

	<!-- FONTAWESOME -->
	<link href="commun/fontawesome/css/fontawesome.css" rel="stylesheet">
	<link href="commun/fontawesome/css/brands.css" rel="stylesheet">
	<link href="commun/fontawesome/css/solid.css" rel="stylesheet">

	<style>
		.red {
			color: red;
		}
	</style>
</head>

<body>

	<div class="container">
		
		<!-- TITRE + LOGO -->
		<div class="row">
			<nav class="navbar navbar-default">
				<div class="navbar-header">
					<h1 class="navabr-brand"><img width="150" height="150" src="commun/image/logo.png" alt="logo">
					Gestion des formations</h1>
				</div>
				
				<!-- BARRE DE MENU -->
				<ul class="nav navbar-nav">
					<li><a href="commun/image/guide.pdf" target="_blank"><i class="fa-solid fa-circle-question"></i></a></li>
				</ul>
				
			</nav>
		</div>
			
		<!-- FORMULAIRE DE CONNEXION -->
		<div class="row">
			
			<form class="form-horizontal col-md-push-2 col-md-8" action="commun/class/connexion.php" method="POST" name="formConnexion">
				
				<legend>Connexion</legend>
					
				<?php
					if(isset($_GET['message']))
						echo "<p class='red'>".$_GET['message']."</p>";
				?>
		
				<div class="row">	
					<div class="form-group">				
						<label class="col-md-2">Login :</label>
						<div class="col-md-4">
							<input class="form-control" type="text" id="login" name="login">
						</div>
								
						<label class="col-md-2">Mot de passe :</label>
						<div class="col-md-4">
							<input class="form-control" type="password" id="pw" name="pw">
						</div>
					
						<div class="col-md-offsett-2 col-md-4">
							<button class="btn btn-primary" type="submit">Connexion</button>
						</div>
					
					<!-- CLASS FORM-GROUP -->	
					</div>
												
				<!-- CLASS ROW -->
				</div>
		
			</form>
		
		<p class="red">Tous les champs sont obligatoires</p>
	
	<!-- CLASS CONTAINER -->
	</div>

</body>

<script scr="commun/bootstrap/js/jquery-3.6.1.min.js" type="text/javascript"></script>
<script scr="commun/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

</html>
