<!-- ##################################################################

			HEADER 			 
		
#################################################################### -->

<?php 
	session_start();
	include '../commun/class/classeSQL.php';
	$sql = new ClassSQL();
	
	if (!isset($_SESSION["id"])) header('location:../index.php');
?>

<!DOCTYPE html>

<head>
	<meta charset='utf-8'>
	<title>Gestion des formations PHP</title>
	
	<!-- BOOTSTRAP -->
	<link href="../commun/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

	<!-- FONTAWESOME -->
	<link href="../commun/fontawesome/css/fontawesome.css" rel="stylesheet">
	<link href="../commun/fontawesome/css/brands.css" rel="stylesheet">
	<link href="../commun/fontawesome/css/solid.css" rel="stylesheet">

	<style>
		.red {
			color: red;
		}
	</style>
</head>

<body>

	<div class="container">

		<header>
				
			<!-- TITRE + LOGO -->
			<div class="row">
				<nav class="navbar navbar-default">
					<div class="navbar-header">
						<h1 class="navbar-brand"><img width="150" height="150" src='../commun/image/logo.png' alt='logo'>
						Gestion des formations</h1>
					</div>
		
					<!-- BARRE DE MENU -->
					<ul class="nav navbar-nav">
						<li><a href='formations_user.php'>Mes formations</a></li>
						<li><a href='offres.php'>Les offres</a></li>
						<li><a href='compte_user.php'>Mon compte</a></li>
						<li><a href='javascript:if(confirm("Etes-vous sur(e) de vouloir vous déconnecter ?"))document.location.href="../commun/class/deconnexion.php"' >Déconnexion<i class="fa-solid fa-power-off"></i></a></li>
						<li><a href="../commun/image/guide.pdf" target="_blank"><i class="fa-solid fa-circle-question"></i></a></li>
					</ul>
					
					<?php 
						$sql = $sql->GetUtilisateur($_SESSION["id"]);
					?>
					
					<p class="navbar-text pull-right"><i class="fa-solid fa-user"></i></span>Connecté(e) en tant que <?php echo $sql[0]['prenom_utilisateur']." ".$sql[0]['nom_utilisateur']; ?></p>
				
				</nav>
			</div>
			
		</header>
