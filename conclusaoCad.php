<?php
	include "cabecalho.php";
?>
	<section class="article3">
	<pre>
<?php
	print_r($_POST);
	$dados = file('logins.csv');
	foreach ($dados as $posicao => $linha) {
		if($posicao != 0){
			$colunas = explode(";", $linha);
			if ($_POST["nome"] == $colunas[0]) {
				print("Usuário já existe!");
				print('<meta http-equiv="refresh" content="3"; url=paginaCadastro.php">');
			}
				
		}
	}
	foreach ($dados as $posicao => $linha) {
		if($posicao != 0){
			$colunas = explode(";", $linha);
			if ($_POST["email"] == $colunas[1]) {
				print("E-mail já cadastrado!");
				print('<meta http-equiv="refresh" content="3"; url=paginaCadastro.php">');
			}
				
		}
	}
	$senha = $_POST["senha"];
	$confsenha = $_POST["confsenha"];

	if ($senha === $confsenha) {
		if (is_null($_POST["atualizacoes"]) or $_POST["atualizacoes"]== "") {
			$atualizacoes = 'false';
		}else{
			$atualizacoes = $_POST['atualizacoes'];
		}
		if (is_null($_POST["cpf"]) or $_POST["cpf"] == "") {
			$cpf = 'false';
		}else{
			$cpf = $_POST['cpf'];
		}
		$data = explode('-', $_POST['data']);
		$dia = $data[2];
		$mes = $data[1];
		$ano = $data[0];

		$usuario = $_POST['nome'];
		$email = $_POST['email'];
		$genero = $_POST['genero'];
		$codigo = rand(1,100000);

		foreach ($dados as $posicao => $linha) {
			if($posicao != 0){
				$colunas = explode(";", $linha);
				if ($codigo == $colunas[7]) {
					$codigo = rand(1,100000);
				}
				
			}
		}
	}else{
		print("<h2>senhas não coiscindem!</h2>");
		print('<meta http-equiv="refresh" content="3"; url=paginaCadastro.php">');
	}

		// $linha = "\n".$usuario.";".$email.";".$senha.";".$dia.'-'.$mes.'-'.$ano.";".$genero.";".$cpf.";".$atualizacoes.";";

		// $arquivo = fopen("logins.csv", "a+");

		// fwrite($arquivo, $linha);

		// fclose($arquivo);
		// print("Cadastro concluido com exito!");
		// echo('<meta http-equiv="refresh" content="20"; url=index.php">');
?>
	</pre>
	</section>
<?php
	include "rodape.php";