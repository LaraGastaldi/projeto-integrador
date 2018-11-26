<?php
	include "cabecalho.php";
?>
	<h2 style="color: white">Jogos por categoria</h2>
	<section class="article2">
		
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

<?php
	include ("rodape.php");
?>