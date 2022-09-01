<!-- ##################################################################

			HEADER 			 
		
#################################################################### -->

<?php 
	session_start();
	include '../commun/class/classeSQL.php';
	$sql = new ClassSQL();
	
	if(!isset($_SESSION["id"])) {
		header('location:../index.php');
	}
?>

<!DOCTYPE html>

<head>
	<meta charset='utf-8'>
	<title>Intranet M2L</title>
	
	<!-- BOOTSTRAP -->
	<link href="../commun/bootstrap/css/bootstrap.css" rel="stylesheet" />
	<link href="../commun/bootstrap/css/bootstrap-theme.css" rel="stylesheet" />
	<script scr="../commun/bootstrap/js/jquery.js" type="text/javascript"></script>
	<script scr="../commun/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</head>

<body>

	<div class="container">

		<header>
				
			<!-- TITRE + LOGO -->
			<div class="row">
				<nav class="navbar navbar-default">
					<div class="navbar-header">
						<h1 class="navbar-brand">&nbsp;&nbsp;&nbsp;<img width="150" height="150" src='../commun/image/logo.png' alt='logo'>
						&nbsp;&nbsp;&nbsp;Gestion des formations</h1>
					</div>
		
					<!-- BARRE DE MENU -->
					<ul class="nav navbar-nav">
						<li><a href='formations_user.php'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mes formations&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
						<li><a href='offres.php'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Offres&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
						<li><a href='compte_user.php'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mon compte&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
						<li><a href='javascript:if(confirm("Etes-vous sur(e) de vouloir vous déconnecter ?"))document.location.href="../commun/class/deconnexion.php"' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Déconnexion&nbsp;&nbsp;<span class="glyphicon glyphicon-off"></span></a></li>
						<li><a href='../commun/image/guide.pdf'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-question-sign"></span></a></li>
					</ul>
					
					<?php 
						$sql = $sql->GetUtilisateur($_SESSION["id"]);
					?>
					
					<p class="navbar-text pull-right"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Connecté(e) en tant que <?php echo $sql[0]['prenom_utilisateur']." ".$sql[0]['nom_utilisateur']; ?></p>
				
				</nav>
			</div>
			
		</header>
