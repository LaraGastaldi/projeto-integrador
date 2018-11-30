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
		}
		$foto = $_FILES["foto"]["name"];
		$folderName = "imagens/";
		$filePath = $folderName. rand(10000, 990000). '_'. time().'.'.$ext;
		if ( move_uploaded_file( $_FILES["foto"]["tmp_name"], $filePath)) {
    	echo("Enviado!");
  	} else {
    	echo("Erro!");
  	}
		$id = uniqid();
		if (procurarUsuario($_SESSION['login']) != false) {
			$autor = procuraUsuario($_SESSION);
		}else{
			$autor = procurarUsuario($_COOKIE['admin']);
		}
		$nome = $_POST['titulo'];
		$descricao = $_POST['descricao'];
		$categoria = $_POST['categoria'];
		$imagem = $filePath;
		$array = ["id" => $id, "nome" => $nome, "categoria" => $categoria, "autor" => $autor, "descricao" => $descricao, "imagem" => $imagem];
		enviarResenha($array);
		echo('<meta http-equiv="refresh" content="10;url=detalhaJogo.php?cod='.$_.'">');
	}
?>
<section class="res">
  <form method="post" action="cadastroResenha.php?action=enviar" enctype="multipart/form-data" onSubmit="return validateImage();>
    <h2 id="titulo">Escrever resenha
    </h2>
    <label for="titulo">
    </label>
    <input type="text" name="titulo" placeholder="Título" id="titulo">
    <br>
    <br>
    <label for="descricao">
    </label>
    <textarea name="descricao" placeholder="Escreva algo.." id="descricao">
    </textarea>
    <br>
    <br>
    <label for="categoria"><h3 style="text-align: left;">Categoria</h3></label>
    <select name="categoria">
      <option value="terror">Terror</option>
      <option value="Ação-Aventura">Ação-Aventura</option>
      <option value="RPG">RPG</option>
    </select>
    </section>
  <section class="etc">
    <label for="foto">Inserir imagem</label><br><br>
    <input type="file" name="foto" id="foto"><br><br>
    <input type="submit" name="enviar" value="Enviar resenha" class="enviarr"><br><br>
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
