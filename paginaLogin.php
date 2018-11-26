<?php
	include "cabecalho.php";
?>

	<section class="article3">
		<h2>Faça seu login</h2>
		<form method="post" action="login.php">
			<label for="nome">Nome de Usuário</label><br>
			<input type="text" name="nome" id="cad" required><br><br>
			<label for="senha">Senha</label><br>
			<input type="password" name="senha" id="cad" required><br>
			<a href="recupecaosenha.php">Esqueceu a senha?</a><br><br>
			<input type="checkbox" name="lembrar"><label for="lembrar">Ficar logado?</label>

			<input type="submit" nome="enviar" value="Concluir login" class="cax">
		</form>

	</section>
<?php
	include ("rodape.php");
?>