<?php
	include "cabecalho.php";
	$jogosDestaque = sortLikes();
?>

	<!--<section class="espacamento4">.</section>
	<section class="destaque">
		<a href="detalhaJogo.php?cod=12">
			<img src="imagens/gta.jpeg" class="image">
			<div class="middle">
   				<div class="text">GTA V</div>
  			</div>
  		</a>
	</section>
	<div class="divider"></div>
	<br><br>
	-->
	<br><br>
	<section class="espacamento5">.</section>
	<section class="destaques">
		<h2>Ranking de resenhas</h2>
		<div class="container">
            <table class="table-striped">
                <thead class="thead-dark">
                   	<tr>
                        <th>Posição</th>
                        <th>Jogo</th>
                        <th>Categoria</th>
                        <th>Número de likes</th>
                    </tr>
                </thead>
                <tbody>
<?php
			foreach ($jogosDestaque as $posicao => $info) {
				$jogo = buscaJogo($info['cod_res']);
?>
					<tr>
						<td><?php print($posicao+1); ?></td>
						<td><a  style="color: #000;" href="detalhaJogo.php?cod=<?php print($jogo['id']) ?>"><?php print($jogo['nome']) ?></a></td>
						<td><?php print($jogo['categoria']); ?></td>
						<td><?php print($info['likes']); ?></td>
					</tr>
<?php
			}
?>
                </tbody>
            </table>
       	</div>
	</section>

<?php
	include "rodape.php";
