<?php
	//comecamos o arquivo incluindo o cabecalho e as funcoes, alem de pegar os contatos dentro do arquivo json e os convertendo para array
	include "cabecalho.php";
	include "funcoes.php";
	$dados = file_get_contents("dados.json");
	$contatos_array = json_decode($dados, true);
	if (!isset($_GET['acao'])) {
		$_GET['acao'] = "";
	}
?>
<?php
	if ( isset($_GET['acao']) ){
        //DELETE
        if ($_GET['acao'] == 'excluir'){
            // echo 'tentou excluir o '.$_GET['numero'];

            foreach ($contatos_array as $pos => $contato) {

                if ($contato['number'] == $_GET['numero']){
                    // echo "encontrei o contato";
                    unset( $contatos_array[$pos] );
                    $json = json_encode($contatos_array, JSON_PRETTY_PRINT);
        			file_put_contents('dados.json', $json);
                    break;
                }
            }
        }
        //UPDATE
        if ($_GET['acao'] == 'editar'){
            // echo 'tentou editar o '.$_GET['numero'];
            foreach ($contatos_array as $contato) {
            	if ($_GET['numero'] == $contato['number']) {
            		$contatoEncontrado = $contato;
            		// print_r($contatoEncontrado);
            		break;
            	}
            }
        }
        //CADASTRAR
        if ($_GET['acao'] == 'cadastrar') {
        	// echo 'tentou cadastrar o '.$_POST['campo_nome'];
        	$novoContatinho = array(
        		"name" => $_POST['campo_nome'],
        		"email" => $_POST['campo_email'],
        		"number" => uniqid()
        	);
        	$contatos_array[] = $novoContatinho;
        	$json = json_encode($contatos_array, JSON_PRETTY_PRINT);
        	file_put_contents('dados.json', $json);
        }
        //SALVAR EDIÇÃO
        if ($_GET['acao'] == 'salvar_contato_editado') {
    		//print_r($_POST);
    		foreach ($contatos_array as $pos => $contato) {
    			if ($_POST['campo_numero'] == $contato['number']) {
    				$contatos_array[$pos]['name'] = $_POST['campo_editar_nome'];
    				$contatos_array[$pos]['email'] = $_POST['campo_editar_email'];
    				$json = json_encode($contatos_array, JSON_PRETTY_PRINT);
        			file_put_contents('dados.json', $json);
                    break;
    			}
    		}
    	}
    	//PROCURAR POR NOME/EMAIL
    	if ($_GET['acao'] == "procurar") {
    		foreach ($contatos_array as $pos => $contato) {
    			if ($_POST['campo_procura'] == $contato['name'] or $_POST['campo_procura'] == $contato['email']) {
    				$listinha[] = array($contato['name'], $contato['email'], $contato['number']);
    			}
    		}
    			//print_r($listinha);
    		if (isset($listinha)) {
    			print('<table>');
    			print('<tr class="indice">');
    			print('<td>Numero</td>');
    			print('<td>Nome</td>');
    			print('<td>E-mail</td>');
    			print('<td>Editar</td>');
    			print('<td>Excluir</td>');
    			print('</tr>');
    			foreach ($listinha as $pos => $contato) {
    				print('<tr>');
    				print('<td>'.$contato[2].'</td>');
    				print('<td>'.$contato[0].'</td>');
    				print('<td>'.$contato[1].'</td>');
    				print("<td><a href='?acao=editar&numero=".$contato[2]."'>✍️</a></td>");
					print("<td><a href='?acao=excluir&numero=".$contato[2]."'>❌</a></td>");
    				print('</tr>');
    			}
    			print('</table>');
    			print('<br><br>');
    		}
    	}
    }

   
	// 	if ($_GET['acao'] == "editar") {
	// 		echo "Tentou editar o ".$_GET['numero']."<br>";
	// 		foreach ($contatos_array as $pos => $pessoa) {
	// 			if ($pessoa['number'] == $_GET['numero']) {
	// 				echo $pessoa['name'].' prestes a ser editado(a)';
	// 			}
	// 		}
	// 	}
	// 	if ($_GET['acao'] == "excluir") {
	// 		echo "Tentou excluir o ".$_GET['numero'];
	// 		foreach ($contatos_array as $pos => $pessoa) {
	// 			if ($pessoa['number'] == $_GET['numero']) {
	// 				echo $pessoa['name'].' prestes a ser excluido(a)';
	// 				unset($contatos_array[$pos]);
	// 			}
	// 		}
	// 	}
	// }
?>
	<section>
		<table>
			<tr class="indice">
				<td>Número</td>
				<td>Nome</td>
				<td>E-mail</td>
				<td>Editar</td>
				<td>Excluir</td>
			</tr>

			<!-- <pre> -->
<?php
	//print_r($contatos_array);
	foreach ($contatos_array as $value) {
		//print_r($value);
		print("<tr>");
		print("<td>".$value['number']."</td>");
		print("<td>".$value['name']."</td>");
		print("<td>".$value['email']."</td>");
		print("<td><a href='?acao=editar&numero=".$value['number']."'>✍️</a></td>");
		print("<td><a href='?acao=excluir&numero=".$value['number']."'>❌</a></td>");
		print("</tr>");
	} 
?>
		</table>
	</section>

	<form method="post" action="?acao=cadastrar">
		<h2>Cadastre um contato</h2>
		<input type="text" name="campo_nome" placeholder="Nome" required><br>
		<input type="text" name="campo_email" placeholder="E-mail" required><br>
		<input type="submit" value="Cadastro">
	</form>
<?php
	if (!isset($contatoEncontrado)) {
		$contatoEncontrado = array();
		$contatoEncontrado['name'] = "";
		$contatoEncontrado['number'] = "";
		$contatoEncontrado['email'] = "";
	}
?>
	<form method="post" action="?acao=salvar_contato_editado">
		<h2>Editar contato</h2>
		<input readonly type="hidden" name="campo_numero" value="<?= $contatoEncontrado['number'] ?>" required>
		<input type="text" name="campo_editar_nome" placeholder="Escolha um contato" value="<?= $contatoEncontrado['name'] ?>" required><br>
		<input type="text" name="campo_editar_email" placeholder="Escolha um contato" value="<?= $contatoEncontrado['email'] ?>" required><br>
		<input type="submit" value="Concluir">
	</form>

	<form method="post" action="?acao=procurar">
		<h2>Pesquisar</h2>
		<input type="text" name="campo_procura" placeholder="Procurar por nome/email" required> <button type="submit">🔍</button>
	</form>

</body>
</html>