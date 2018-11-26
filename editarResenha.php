<?php
include "cabecalho.php";
$jogo = buscaJogo($_GET['cod']);
$categorias = array('RPG', 'Terror', 'Ação-Aventura');

if (@isset($_SESSION['login']) or @isset($_COOKIE['admin'])) {
?>
	<section class="res">
		<form method="post" action="update.php?cod=<?php print($jogo['id']) ?>&img=<?php print($jogo['imagem']) ?>">
			<h2 id="titulo">Editar resenha</h2>
			<label for="titulo"></label>
			<input type="text" name="titulo" value="<?php print($jogo['nome']) ?>" id="nome"><br><br>
			<label for="descricao"></label>
			<textarea name="descricao" id="descricao"><?php print($jogo['descricao']) ?></textarea>
			<label for="categoria"><h2>Categoria</h2></label>
			<select name="categoria">
				<option value="terror">Terror</option>
				<option value="Ação-Aventura">Ação-Aventura</option>
				<option value="RPG">RPG</option>
			</select>
			<br><br>
		<input type="submit" name="enviar" value="Salvar" class="enviarr"><br><br>
		</form>
	</section>
	<div class="divider"></div>
	<br><br>
<?php
	include "rodape.php";
}else{
	echo('<meta http-equiv="refresh" content="0;url=paginaLogin.php">');
}