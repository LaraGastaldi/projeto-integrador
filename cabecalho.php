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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/javascript.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta charset="utf-8">
        <link rel="icon" href="icon.png">
    </head>

    <body class="fundo">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <ul class="navbar-nav">
            	<a class="navbar-brand" href="#">
    				<img src="logo1.png" alt="Logo" style="width:180px;">
  				</a>
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Enviar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Suas resenhas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Registrar</a>
                </li>
                <form class="form-inline" action="/busca.php">
    				<input class="form-control mr-sm-2" type="text" placeholder="Search">
    				<button class="btn btn-light" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
  				</form>
            </ul>
        </nav>
        <!-- <table>
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
	</table> -->
        <div class="divider"></div>
        <br>
        <br>
        <br>
        <br>
        <!-- <img src="imagens/<?php print($mascote); ?>.gif" id="mascote"> -->