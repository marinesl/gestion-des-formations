<!-- ##################################################################

			PAGE DE CONNEXION 
		
#################################################################### -->



<!DOCTYPE html>

<head>
	<meta charset='utf-8'>
	<title>Intranet M2L</title>
	
	<!-- BOOTSTRAP -->
	<link href="commun/bootstrap/css/bootstrap.css" rel="stylesheet" />
</head>

<body>

	<div class="container">
		
		<!-- TITRE + LOGO -->
		<div class="row">
			<nav class="navbar navbar-default">
				<div class="navbar-header">
					<h1 class="navabr-brand">&nbsp;&nbsp;&nbsp;<img width="150" height="150" src='commun/image/logo.png' alt='logo'>
					&nbsp;&nbsp;&nbsp;Gestion des formations</h1>
				</div>
				<br><br>
				
				<!-- BARRE DE MENU -->
				<ul class="nav navbar-nav">
					<li><a href='formation/guide_user.php'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-question-sign"></span></a></li>
				</ul>
				
			</nav>
		</div>
		
		<br><br>
			
		<!-- FORMULAIRE DE CONNEXION -->
		<div class="row">
			
			<form class="form-horizontal col-md-push-2 col-md-8" action='commun/class/connexion.php' method='POST' name='formConnexion'>
				
				<legend>Connexion</legend>
					
				<?php
					if(isset($_GET['message']))
						echo "<p><font color='red'>".$_GET['message']."</font></p>";
				?>
		
				<div class="row">	
					<div class="form-group">				
						<label class="col-md-2">Login :</label>
						<div class="col-md-4">
							<input class="form-control" type='text' id='login' name='login'>
						</div>
								
						<label class="col-md-2">Mot de passe :</label>
						<div class="col-md-4">
							<input class="form-control" type='password' id='pw' name='pw'>
						</div>
					
						<div class="col-md-offsett-2 col-md-4">
							<button class="btn btn-primary" type='submit'>Connexion</button>
						</div>
					
					<!-- CLASS FORM-GROUP -->	
					</div>
												
				<!-- CLASS ROW -->
				</div>
		
			</form>
		
		<p><font color='red'>Tous les champs sont obligatoires</font></p>
	
	<!-- CLASS CONTAINER -->
	</div>

</body>

<script scr="commun/bootstrap/js/jquery.js" type="text/javascript"></script>
<script scr="commun/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

</html>
