<?php
ob_start();
session_start();
if(!isset($_SESSION['usuarioSession']) AND !isset($_SESSION['senhaSession'])):
	header("Location: ../");
	die;
endif;
?>