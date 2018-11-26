<?php

	// function buscaContato($numero_identificador){
	// 	$contato = array();

	// 	$dadosnc = file_get_contents("dados.json");
	// 	$dados = json_decode($dadosnc, true);
	// 	foreach ($dados as $linha) {
	// 		$colunas = explode(",", $linha);
	// 		if ($colunas[0] == $numero_identificador) {
	// 			$contato['number'] = $colunas[0];
	// 			$contato['name'] = $colunas[1];
	// 			$contato['email'] = $colunas[2];
				
				
	// 		}
	// 	}

	// 	return $contato;
	// }

	function buscaContatos($nome){
		$cont = 0;
		$contato = array();

		$dadosnc = file_get_contents("dados.json");
		$dados = json_decode($dadosnc, true);
		foreach ($dados as $linha) {
			if ($linha['name'] == $nome) {
				$contato[$cont]['number'] = $linha['number'];
				$contato[$cont]['name'] = $linha['name'];
				$contato[$cont]['email'] = $linha['email'];
			
				$cont++;
			}
		}

		return $contato;
	}
	// $nome = buscaContatos('Tara Barber');
	// print_r($nome);