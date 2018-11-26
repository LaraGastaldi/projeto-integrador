<?php
	include "cabecalho.php";
	$jogo = array("id" => $_GET['cod'], "autor" => 0, "nome" => $_POST['titulo'], "categoria" => $_POST['categoria'], "descricao" => $_POST['descricao'], "imagem" => $_GET['img']);
	updateResenha($jogo);
?>
	<meta http-equiv="refresh" content="0;url=detalhaJogo.php?cod=<?php print($jogo['id']) ?>">