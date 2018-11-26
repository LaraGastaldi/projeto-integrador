<?php
	include "funcoes.php";
	session_start();
	if (isset($_POST['lembrar'])) {
		$lembrar = 'on';
	}else{
		$lembrar = 'off';
	}
	logarUsuario($_POST['nome'], $_POST['senha'], $lembrar);
	// if (($_POST['nome']=='admin') and ($_POST['senha']=='admin')) {

	// 	if ($_POST['lembrar'] == "on") {
	// 		$cookie_name = "admin";
	// 		$cookie_value = "admin";
	// 		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	// 	}else{
	// 		$_SESSION['login'] = "admin";
	// 		$_SESSION['usuario'] = "administrador";
	// 	}

	// 	echo('<meta http-equiv="refresh" content="0;url=minhasresenhas.php">');

	// }else{

	// 	echo('<meta http-equiv="refresh" content="0;url=index.php">');

	// }

?>