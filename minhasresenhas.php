<?php
include "cabecalho.php";
if (@isset($_SESSION['login']) or @isset($_COOKIE['admin'])) {
    $usuario  = procurarUsuario(@$_SESSION['login']);
    $usuario1 = procurarUsuario(@$_COOKIE['name']);
    if ($usuario['nome'] == "admin" or $usurio1['nome'] == "admin") {
				$titulo    = "Todas as resenhas";
        $jogo      = array();
        $dadosjson = file_get_contents('json/dados1.json');
        $jogos     = json_decode($dadosjson, true);
    } else {
				$titulo = "Suas resenhas";
        $jogos = buscaJogoAutor($usuario['id_user']);
        if ($jogos == array()) {
            $vazio = true;
        } else {
            $vazio = false;
        }
    }
?>
    <section class="espacamento11">.</section>
    <section class="dados5">
        <h2>Minhas resenhas</h2>
<?php
    if ($vazio) {
?>
            <h3 style="color: red;">Você não enviou nenhuma resenha ainda!</h3><br>
            <a href="cadastroResenha.php"><h3>Enviar agora!</h3></a>
<?php
    } else {
?>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
			foreach ($jogos as $jogo) {
?>
												<tr>
													<td><a style="color: black;" href="detalhaJogo.php?cod=<?=$jogo['id'] ?>"><?=$jogo['nome'] ?></a></td>
													<td><?=$jogo['categoria'] ?></td>
													<td><a href="editarResenha.php?cod=<?=$jogo['id'] ?>">✍️</a></td>
													<td><a href="excluirResenha.php?cod=<?=$jogo['id'] ?>">❌</a></td>
												</tr>
<?php
			}
?>
                    </tbody>
                </table>
<?php
    }
?>
            </div>
          </section>
          <div class="divider"></div>
<?php
    include "rodape.php";
} else {
    echo ('<meta http-equiv="refresh" content="0;url=paginaLogin.php">');
}
?>
