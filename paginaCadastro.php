<?php
	include "cabecalho.php";
?>

	<section class="article3">
		<h2>Faça seu cadastro!</h2>
		<form method="post" action="cadastrousuario.php">

			<label for="nome">Nome de Usuário</label><br>
			<input type="text" name="nome" id="cad" required><br><br>

			<label for="email">E-mail</label><br>
			<input type="email" name="email" id="cad" required><br><br>

			<label for="senha">Senha</label><br>
			<input type="password" name="senha" id="cad" required><br><br>

			<label for="confsenha">Confirmar senha</label><br>
			<input type="password" name="confsenha" id="cad" required><br><br>

			<label for="data">Data de Nascimento (opcional)</label><br>
			<input type="date" name="data" id="cad"><br><br>

			<label for="genero">Gênero</label><br>
			<input type="radio" name="genero" value="f">Feminino<br>
			<input type="radio" name="genero" value="m">Masculino<br>
			<input type="radio" name="genero" value="n/a">Outro<br><br>

			<input type="checkbox" required>Aceito e concordo com os <a href="">Termos de Uso</a><br><br>
			<input type="checkbox" name="atualizacoes" value="true">Receber e-mails de atualizações e promoções?<br><br>

			<input type="submit" nome="enviar" value="Concluir cadastro" class="cax">
			<a href="index.php"><button class="caxi">Cancelar</button></a>
	
			
		</form>

	</section>
<?php
	include ("rodape.php");
?>