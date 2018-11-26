<?php

	function buscaJogo($id){
		$jogo = array();

		$dadosjson = file_get_contents('json/dados1.json');
		$dados = json_decode($dadosjson, true);
		foreach ($dados as $linha) {
			if ($linha['id'] == $id) {
				$jogo['id'] = $linha['id'];
				$jogo['nome'] = $linha['nome'];
				$jogo['categoria'] = $linha['categoria'];
				$jogo['autor'] = $linha['autor'];
				$jogo['descricao'] = $linha['descricao'];
				$jogo['imagem'] = $linha['imagem'];
				// se o campo foto veio vazio entao assume pessoa.png
				if (!trim($jogo['imagem'])) $jogo['imagem'] = "imagens/exemplo.jpg";
			}
		}

		return $jogo;
	}

	function buscaJogoAutor($id_user){
		$jogo = array();

		$dadosjson = file_get_contents('json/dados1.json');
		$dados = json_decode($dadosjson, true);
		foreach ($dados as $linha) {
			if ($linha['autor'] == $id_user) {
				$jogo[] = $linha;
			}
		}
		return $jogo;
	}

	function listaJogosCategoria($categoria){
		$jogos = array();
		$dadosjson = file_get_contents('json/dados1.json');

		$dados = json_decode($dadosjson, true);


		foreach ($dados as $linha) {
			$jogo = array();
			if ($linha['categoria'] == $categoria) {
				$jogo['id'] = $linha['id'];
				$jogo['nome'] = $linha['nome'];
				$jogo['categoria'] = $linha['categoria'];
				$jogo['autor'] = $linha['autor'];
				$jogo['descricao'] = $linha['descricao'];
				$jogo['imagem'] = $linha['imagem'];
				// se o campo foto veio vazio entao assume pessoa.png
				if (!trim($jogo['imagem'])) $jogo['imagem'] = "imagens/exemplo.jpg";

				$jogos[] = $jogo;
			}
		}
		return $jogos;
	}

	function updateResenha($jogo){
		$dadosjson = file_get_contents('json/dados1.json');

		$dados = json_decode($dadosjson, true);

		foreach ($dados as $key => $value) {
			if ($value['id'] == $jogo['id']) {
				$dados[$key]['id'] = $jogo['id'];
				$dados[$key]['nome'] = $jogo['nome'];
				$dados[$key]['categoria'] = $jogo['categoria'];
				$dados[$key]['autor'] = $jogo['autor'];
				$dados[$key]['descricao'] = $jogo['descricao'];
				$dados[$key]['imagem'] = $jogo['imagem'];
				break;
			}
		}

		$dados1 = json_encode($dados, JSON_PRETTY_PRINT);
		file_put_contents('json/dados1.json', $dados1);
	}

	function sortLikes(){
		$dadosjson = file_get_contents('json/info.json');

		$dados = json_decode($dadosjson, true);
		$aux = array();
		$max = count($dados);
		for ($i=0; $i < $max; $i++) {
			for ($j=0; $j < $max; $j++) {
				if ($dados[$i]['likes'] > $dados[$j]['likes']) {
					$aux = $dados[$i];
					$dados[$i] = $dados[$j];
					$dados[$j] = $aux;
				}
			}
		}
		return $dados;
	}

	function buscaJogoLikes($cod){
		$dadosjson = file_get_contents('json/info.json');

		$dados = json_decode($dadosjson, true);
		foreach ($dados as $valor) {
			if ($valor['cod_res'] == $cod) {
				$likes = $valor['likes'];

				break;
			}
		}
		return $likes;
	}

	function buscaUsuarioLike($cod, $id){
        $dadosjson = file_get_contents('json/likes.json');

        $dados = json_decode($dadosjson, true);
        foreach ($dados as $valor) {
            if ($valor['cod_res'] == $cod) {
                if ($valor['id_user'] == $id){
                    return true;
                }
            }
        }
    }

	function addLike($cod){
		$dadosjson = file_get_contents('json/info.json');

		$dados = json_decode($dadosjson, true);

		foreach ($dados as $pos => $valor) {
    		if ($valor['cod_res'] == $cod) {
    			$dados[$pos]['likes']++;
    			$json = json_encode($dados, JSON_PRETTY_PRINT);
        		file_put_contents('info.json', $json);
                break;
    		}
    	}
		$json = json_encode($dados, JSON_PRETTY_PRINT);
        file_put_contents('json/info.json', $json);
	}

	function buscaJogoPorNome($nome){
		$jogos = array();
		$dadosjson = file_get_contents('json/dados1.json');

		$dados = json_decode($dadosjson, true);
		foreach ($dados as $key => $value) {
			if (strtolower($value['nome']) == strtolower($nome)) {
				$jogos[] = $value;
			}
		}
		if (is_array(@$jogos[0])) {
			return $jogos;
		}else{
			return false;
		}
	}

	function buscaJogoPorCategoria($categoria){
		$jogos = array();
		$dadosjson = file_get_contents('json/dados1.json');

		$dados = json_decode($dadosjson, true);
		foreach ($dados as $key => $value) {
			if (strtolower($value['categoria']) == strtolower($categoria)) {
				$jogos[] = $value;
			}
		}
		if (is_array($jogos[2])) {
			return $jogos;
		}else{
			return false;
		}
	}

	function escolheBusca($busca){

	}

	function procurarUsuario($nome){

		$dadosjson = file_get_contents('json/usuarios.json');
		$dados = json_decode($dadosjson, true);

		foreach ($dados as $valor) {
			if ($valor['nome'] == $nome) {
				$usuario = array();
				$usuario['id_user'] = $valor['id_user'];
				$usuario['nome'] = $valor['nome'];
				$usuario['tipo'] = $valor['tipo'];
				$usuario['senha'] = $valor['senha'];
				break;
			}
		}
		if (isset($usuario)) {
			return $usuario;
		}else{
			return false;
		}
	}

	function procuraUsuarioId($id_user){
		$dadosjson = file_get_contents('json/usuarios.json');
		$dados = json_decode($dadosjson, true);

		foreach ($dados as $valor) {
			if ($valor['id_user'] == $id_user) {
				$usuario = array();
				$usuario['id_user'] = $valor['id_user'];
				$usuario['nome'] = $valor['nome'];
				$usuario['tipo'] = $valor['tipo'];
				$usuario['senha'] = $valor['senha'];
				break;
			}
		}
		if (isset($usuario)) {
			return $usuario;
		}else{
			return false;
		}
	}

	function logarUsuario($nome, $senha, $lembrar){
		$usuario = procurarUsuario($nome);
		if ($usuario == false) {
			echo ('<p>Usuário não encontrado!</p>');
			echo('<meta http-equiv="refresh" content="2;url=paginaLogin.php">');
			return false;
		}elseif ($senha == $usuario['senha']) {
			if ($lembrar == "on") {
				$cookie_name = $nome;
				$cookie_value = $nome;
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
			}else{
				$_SESSION['login'] = $nome;
				$_SESSION['usuario'] = $nome;
			}
			echo ('<p>Logado!</p>');
			echo('<meta http-equiv="refresh" content="1;url=minhasresenhas.php">');
			return true;
		}else{
			echo ('<p>Usuário ou senha inválidos</p>');
			print_r($usuario);
			echo('<meta http-equiv="refresh" content="10;url=paginaLogin.php">');
			return false;
		}
	}

	function cadastrarUsuario($array_user){
		$dadosjson = file_get_contents('json/usuarios.json');
		$dados = json_decode($dadosjson, true);

		$dados[] = $array_user;
		$json = json_encode($dados, JSON_PRETTY_PRINT);
        file_put_contents('json/usuarios.json', $json);
	}

	function escolherMascote(){
		$numero = rand(1,2);
		if ($numero == 1) {
			return "dragao";
		}else{
			return "phoenix";
		}
	}

	// // print_r(sortLikes());
	// $jogo = array("id" => 20, "autor" => 0, "nome" => "Dark Souls III", "categoria" => "RPG", "descricao" => "Neste mundo tomado pelo Abismo, cheios de criatura amaldi\u00e7oadas, voc\u00ea ter\u00e1 que decidir o destino de seu mundo nas trevas ou na luz.", "imagem" => "imagens/dark-souls.jpg");
	// updateResenha($jogo);
