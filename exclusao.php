<?php
	include 'cabecalho.php';
	excluirResenha($_GET['cod']);
?>
	<section class="espacamento5">.</section>
	<section class="destaques">
		<h2 align="center">Resenha excluída com sucesso!</h2>
	</section>
<?php
	include 'rodape.php';
	echo('<meta http-equiv="refresh" content="3;url=index.php">');
