<?php
	include 'cabecalho.php';
	$jogos = buscaJogoPorNome($_GET['busca']);
	$cat = buscaJogoPorCategoria($_GET['busca']);
?>

	<section class="article3">
		<h2>Resenhas</h2>

<!--Jogos-->
<?php
	if ($jogos == false) {
?>
	<p>Não foi encontrado resenhas!</p>
<?php
	}else{
?>
	<h3>Resenhas encontradas:</h3>
<?php
		foreach ($jogos as $key => $value) {
?>
	<li><a style="color: black;" href="detalhaJogo.php?cod=<?=$value['id']?>"><?=$value['nome'] ?></a></li>
<?php
		}
	}
?>
	</section>

	<section class="article3">
		<h2>Por categoria</h2>
<!--Categoria-->
<?php
	if ($cat == false) {
?>
	<p>Não foi encontrado categorias!</p>
<?php
	}else{
?>
	<h3>Jogos encontrados por categoria:</h3>
<?php
		foreach ($cat as $key => $value) {
?>
	<li><a style="color: black;" href="categoria.php"><?=$value['nome'] ?></a></li>
<?php
		}
	}
?>
	</section>