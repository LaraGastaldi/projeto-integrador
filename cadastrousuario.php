<?php
	include "funcoes.php";
	session_start();
	print_r($_POST);
	cadastrarUsuario($_POST);
	logarUsuario($_POST['nome'], $_POST['senha'], 'offx');

	echo('<meta http-equiv="refresh" content="0;url=index.php">');
?>