<?php
include "cabecalho.php";
$id_res = $_GET['cod'];
$media = buscaJogoMedia($id_res);
$usuario = procurarUsuario(@$_SESSION['login']);
$usuario1 = procurarUsuario(@$_COOKIE['name']);
$jogo = buscaJogo($id_res);
$autor = procuraUsuarioId($jogo['autor']);
?>
<section class="article">
  <section id="foto">
    <?php
$fotoo = $jogo['imagem'];
print('<a href="'.$fotoo.'"><img src="'.$fotoo.'" class="foto"/></a>');
?>
  </section>
  <section class="dados">
    <?php
if (@$_SESSION['login'] == "admin") {
?>
    <section class="lado">
      <a href="editarResenha.php?cod=<?php print($jogo['id']); ?>">
        <button class="botaozinhu">Editar
        </button>
      </a>
      <button class="botaozinhu">
        <a href="exclusao.php">Excluir
        </a>
      </button>
    </section>
    <?php
}
?>
    <h2>
      <?=$jogo['nome'] ?>
    </h2>
    <p>Autor:
      <?=$autor['nome'] ?>
    </p>
    <p>Categoria:
      <?=$jogo['categoria'] ?>
    </p>
    <p>
      <?=$jogo['descricao'] ?>
    </p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer finibus gravida ex, nec blandit odio feugiat sit amet. Suspendisse ultricies dolor sed accumsan condimentum. Quisque ut sem ut justo accumsan vehicula. Donec iaculis maximus ligula eget placerat. Mauris malesuada, ipsum id bibendum faucibus, elit metus elementum libero, nec luctus sapien metus sit amet magna. Aliquam erat volutpat. In laoreet scelerisque mauris a auctor.
    </p>
  </section>
</section>
<div class="divider">
</div>
<div class="row">
  <div class="col-sm-8">
    <section class="comentarios">
      <h1 style="color: white">Comentários
      </h1>
      <?php
if (@isset($_SESSION['login']) or @isset($_COOKIE['admin'])) {
?>
      <textarea class="caixa" placeholder="Comente sobre a resenha!">
      </textarea>
      <button>Enviar
      </button>
      <?php
}else{
?>
      <textarea class="caixa" style="pointer-events: none; color: red;">Você precisa estar logado para comentar!
      </textarea>
      <?php
}
?>
      <br>
      <br>
      <br>
      <br>
      <div class="comentario">
        <img src="imagens/icone.jpg" class="icone">
        <div class="caixa">
          <?php
if (@$_SESSION['login'] == "admin") {
?>
          <select class="editar">
            <option>
            </option>
            <option>Remover
            </option>
            <option>Denunciar
            </option>
            <option>Alterar
            </option>
          </select>
          <?php
}
?>
          <b>
            <a href="">xXgamerDudeXx
            </a>
          </b>
          <p>Muito boa a resenha!
          </p>
        </div>
      </div>
      <div class="divider">
      </div>
      <br>
      <div class="comentario">
        <img src="imagens/icone.jpg" class="icone">
        <div class="caixa">
          <?php
if (@$_SESSION['login'] == "admin" or isset($_COOKIE['admin'])) {
?>
          <select class="editar">
            <option>
            </option>
            <option>Remover
            </option>
            <option>Denunciar
            </option>
            <option>Alterar
            </option>
          </select>
          <?php
}
?>
          <b>
            <a href="">evilFlower
            </a>
          </b>
          <p>Eu amo esse jogo!!
          </p>
        </div>
      </div>
    </section>
  </div>
  <div class="col-sm-4">
		<h1 style="color: white">Interações!
		</h1>
    <section class="info">
      <h3>Likes
      </h3>
      <p>
        <?=$likes = buscaJogoLikes($id_res);?>
      </p>
      <?php
if (@isset($_SESSION['login']) or @isset($_COOKIE['admin'])) {
if (buscaUsuarioLike($jogo['id'], @$usuario['id_user']) || buscaUsuarioLike($jogo['id'], @$usuario1['id_user'])){
?>
      <p style="color: red;">
        <a href="removerlike.php?cod=<?=$jogo['id']?>&id=<?=$usuario['id_user']?>">
          <button style="opacity: 0.5;">Desfazer like
          </button>
        </a>
      </p>
      <?php
}else{
?>
      <p>
        <a href="editarLike.php?cod=<?=$id_res?>&id=<?=$usuario['id_user']?>">
          <button>👍
          </button>
        </a>
      </p>
      <?php
}
}else{
?>
      <p style="color: red;">
        <button style="pointer-events: none;opacity: 0.5;">👍
        </button> (Você precisa estar logado!)
      </a>
    </p>
  <?php
}
?>
  <h3>Avalie essa resenha!
  </h3>
<?php
	if (@isset($_SESSION['login']) or @isset($_COOKIE['admin'])) {
		if (buscaUsuarioLike($jogo['id'], @$usuario['id_user']) || buscaUsuarioLike($jogo['id'], @$usuario1['id_user'])){
?>
	      <p>
					<a href="editarMedia.php?cod=<?=$id_res ?>&id=<?=$usuario['id_user'] ?>&media=1"><span class="fa fa-star"></span></a>
					<a href="editarMedia.php?cod=<?=$id_res ?>&id=<?=$usuario['id_user'] ?>&media=2"><span class="fa fa-star"></span></a>
					<a href="editarMedia.php?cod=<?=$id_res ?>&id=<?=$usuario['id_user'] ?>&media=3"><span class="fa fa-star"></span></a>
					<a href="editarMedia.php?cod=<?=$id_res ?>&id=<?=$usuario['id_user'] ?>&media=4"><span class="fa fa-star"></span></a>
					<a href="editarMedia.php?cod=<?=$id_res ?>&id=<?=$usuario['id_user'] ?>&media=5"><span class="fa fa-star"></span></a>

	      </p>
<?php
			}else{
?>
	      <p>
					<a href="editarMedia.php?cod=<?=$id_res ?>&id=<?=$usuario['id_user'] ?>&media=1"><span class="fa fa-star"></span></a>
					<a href="editarMedia.php?cod=<?=$id_res ?>&id=<?=$usuario['id_user'] ?>&media=2"><span class="fa fa-star"></span></a>
					<a href="editarMedia.php?cod=<?=$id_res ?>&id=<?=$usuario['id_user'] ?>&media=3"><span class="fa fa-star"></span></a>
					<a href="editarMedia.php?cod=<?=$id_res ?>&id=<?=$usuario['id_user'] ?>&media=4"><span class="fa fa-star"></span></a>
					<a href="editarMedia.php?cod=<?=$id_res ?>&id=<?=$usuario['id_user'] ?>&media=5"><span class="fa fa-star"></span></a>
	      </p>
<?php
			}
	}else{
	?>
	      <p style="color: red;">
					<a href="editarMedia.php?cod=<?=$id_res ?>&id=<?=$usuario['id_user'] ?>&media=1" style="pointer-events: none;"><span class="fa fa-star"></span></a>
					<a href="editarMedia.php?cod=<?=$id_res ?>&id=<?=$usuario['id_user'] ?>&media=2" style="pointer-events: none;"><span class="fa fa-star"></span></a>
					<a href="editarMedia.php?cod=<?=$id_res ?>&id=<?=$usuario['id_user'] ?>&media=3" style="pointer-events: none;"><span class="fa fa-star"></span></a>
					<a href="editarMedia.php?cod=<?=$id_res ?>&id=<?=$usuario['id_user'] ?>&media=4" style="pointer-events: none;"><span class="fa fa-star"></span></a>
					<a href="editarMedia.php?cod=<?=$id_res ?>&id=<?=$usuario['id_user'] ?>&media=5" style="pointer-events: none;"><span class="fa fa-star"></span></a> (Você precisa estar logado!)
	      	</a>
	    	</p>
	  <?php
	}
?>
		<p>Atual: <?=$media ?> estrelas</p>
  </section>
</div>
</div>
<?php
include ("rodape.php");
?>
