<?php
	include 'funcoes.php';
	session_start();
	$usuario = procurarUsuario(@$_SESSION['login']);
	$usuario1 = procurarUsuario(@$_COOKIE['name']);
	$mascote = escolherMascote();
?>
<!DOCTYPE html>
<html>
<head>
	<title>MindGaming</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/javascript.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta charset="utf-8">
	<link rel="icon" href="icon.png">
	<style type="text/css">
		@media (min-width: 300px) {
  			.navbar {
    			width: 100%;
  			}
		}
		@media (min-width: 568px) {
  			.navbar {
    			width: 100%;
  			}
		}
		@media (min-width: 992px) {
  			.navbar {
    			width: 100%;
  			}
		}
		@media (min-width: 1200px) {
  			.navbar {
    			width: 100%;
  			}
		}
		.navbar{
			overflow: hidden;
			top: 0;
			left: 0;
			position: fixed;
			width: 100;
			background-color: #1d2151;
			padding: 1%;
			height: 4%;
		}
		td{
			height: 100%;
			min-height: 100%;
			text-align: center;
			width: relative;
		}
		td a{
			text-decoration-line: none;
			font-size: 115%;
			text-align: center;
			color: #fff;
		}
		td a:hover{
			transition: 0.2s;
			text-shadow: 0 0 0.5em white;
			color: black;
		}
		.logo{
			width: 90%;
		}
		.item-icon{
			width: 12%;
			float: left;
		}
		.item-navbar{
			width: 10%;
			float: left;
			margin-left: 1%;
			margin-right: 1%;
		}
		.user-navbar{
			width: 10%;
			float: left;
			margin-left: 1%;
			margin-right: 1%;
		}
		.gap{
			color: #1d2151;
			width: 150px;
			float: left;
			border-right: 1px solid black;
		}
	</style>
</head>
<body>
	<table>
		<tbody class="navbar">
			<tr>
				<td class="item-icon"><a href="index.php"><img src="logo1.png" class="logo"></a></td>
				<td class="item-navbar"><a href="index.php">Home</a></td>
				<td class="item-navbar"><a href="faq.php">FAQ</a></td>
				<td class="item-navbar"><a href="cadastroResenha.php">Enviar</a></td>
<?php
		if ($usuario['nome'] == "admin" or $usuario1['nome'] == "admin") {
?>
				<td class="item-navbar"><a href="minhasresenhas.php">Lista resenhas</a></td>
<?php
		}else{
?>
				<td class="item-navbar"><a href="minhasresenhas.php">Suas resenhas</a></td>
<?php
		}
?>
				<td class="gap">❤</td>
				<td class="user-navbar">
<?php
	if (@isset($_SESSION['login']) or @isset($_COOKIE['admin'])) {
?>
					<p style="color: white; width: 115%; margin-top: -1%;">Você está logado</p>
				</td>
				<td class="user-navbar">
					<a href="logout.php">Logout</a>
				</td>
<?php
	}else{
?>
					<a href="paginaCadastro.php">Cadastrar</a>
				</td>
				<td class="user-navbar">
					<a href="paginaLogin.php">Login</a>
				</td>
<?php
	}
?>
			</tr>
		</tbody>
	</table>
	<div class="divider"></div>
	<br><br><br><br>
	<!-- <img src="imagens/<?php print($mascote); ?>.gif" id="mascote"> -->
