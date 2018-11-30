<?php
	include "cabecalho.php";
?>
	<div class="row">
		<div class="col">
			<h2 style="color: white;">Resenhas recentes</h2>
<?php
	for ($i=3; $i < 100; $i++) {
		if (buscaJogo($i) == null) {
			break;
		}
		$jogo = buscaJogo($i);
?>
		<li><a href="detalhaJogo.php?cod=<?=$jogo['id'] ?>"><?=$jogo['nome'] ?></a></li>
<?php
	}
?>
		</div>
		<div class="col">
				<h2 style="color: white">Jogos por categoria</h2>
				<section class="article2" style="list-style-type: none;">

				<section class="lista">
					<h3>Terror</h3>
<?php

	$lista = listaJogosCategoria('Terror');

	foreach ($lista as $jogo) {
?>
					<li><a href="detalhaJogo.php?cod=<?=$jogo['id']?>"><?=$jogo['nome'] ?></a></li>
<?php
	}
?>
					<br>
				</section>

				<section class="listaa">
					<h3>Ação-Aventura</h3>
<?php

	$lista = listaJogosCategoria('Ação-Aventura');

	foreach ($lista as $jogo) {
?>
					<li><a href="detalhaJogo.php?cod=<?=$jogo['id']?>"><?=$jogo['nome'] ?></a></li>
<?php
	}
?>
					<br>
				</section>
				<section class="listaaa">
					<h3>RPG</h3>
<?php

	$lista = listaJogosCategoria('RPG');

	foreach ($lista as $jogo) {
?>
					<li><a href="detalhaJogo.php?cod=<?=$jogo['id']?>"><?=$jogo['nome'] ?></a></li>
<?php
	}
?>
					<br>
				</section>

	</section>
</div>
</div>
	<div class="divider"></div>

<?php
	include ("rodape.php");
?>
