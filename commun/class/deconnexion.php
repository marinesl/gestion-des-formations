<?php
/* #####################################################################

					SCRIPT DE DECONNEXION

##################################################################### */

	session_start();
	
	// DESTRUCTION DE LA SESSION
	session_destroy();
	
	// REDIRECTION PAGE DE CONNEXION 
	header('location:../../index.php');
