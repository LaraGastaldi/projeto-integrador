<?php
include "cabecalho.php";
if (@isset($_SESSION['login']) or @isset($_COOKIE['admin'])) {
if (isset($_GET['action'])) {
if (@$_GET['action'] == "enviar") {
print_r($_FILES);
$ext1 = explode('/',$_FILES['foto']['type']);
$ext1 = array_reverse($ext1);
print_r($ext1);
$ext = $ext1[0];
$foto = $_FILES["foto"]["name"];
$validExt = array("jpg", "png", "jpeg", "bmp");
if ($foto == "" or $_FILES["foto"]["size"] <= 0 or !in_array($ext, $validExt)) {
echo("Erro!");
}
$foto = $_FILES["foto"]["name"];
$folderName = "imagens/";
$filePath = $folderName. rand(10000, 990000). '_'. time().'.'.$ext;
// if ( move_uploaded_file( $_FILES["foto"]["tmp_name"], $filePath)) {
// 	echo("Enviado!");
// } else {
// 	echo("Erro!");
// }
$id = uniqid();
if (isset($_SESSION['login'])) {
$autor = procuraUsuario($_SESSION['login']);
}else{
$autor = procurarUsuario($_COOKIE['login']);
}
$nome = $_POST['titulo'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria'];
$imagem = $filePath;
$arrayResenha = array("id" => $id, "nome" => $nome, "categoria" => $categoria, "autor" => $autor, "descricao" => $descricao, "imagem" => $imagem);
print_r($arrayResenha);
enviarResenha($arrayResenha);
echo('<meta http-equiv="refresh" content="0;url=detalhaJogo.php?cod='.$id.'">');
}
}
?>
<section class="res">
  <form method="post" action="cadastroResenha.php?action=enviar" enctype="multipart/form-data">
    <h2 id="titulo">Escrever resenha
    </h2>

    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="titulo" id="titulo" name="titulo">
    </div>
		<div class="input-group mb-3">
			<textarea class="form-control" rows="5" id="descricao" name="descricao">Escreva sobre o jogo..</textarea>
    </div>
    <br>
    <br>
		<div class="input-group mb-3">
    	<label for="categoria">
      	<h3>Categoria
      	</h3>
    	</label>
    	<select class="form-control" name="categoria">
      	<option value="terror">Terror
      	</option>
      	<option value="Ação-Aventura">Ação-Aventura
      	</option>
      	<option value="RPG">RPG
      	</option>
    	</select>
		</div>
    </section>
  <section class="etc">
    <label for="foto">Inserir imagem
    </label>
    <br>
    <br>
    <input type="file" name="foto" id="foto">
    <br>
    <br>
    <input type="submit" name="enviar" value="Enviar resenha" class="enviarr">
    <br>
    <br>
    <a href="index.php" class="cancelar">Cancelar
    </a>
  </section>
  <div class="divider">
  </div>
  <br>
  <br>
  </form>
</section>
<?php
include "rodape.php";
}else{
echo('<meta http-equiv="refresh" content="0;url=paginaLogin.php">');
}
