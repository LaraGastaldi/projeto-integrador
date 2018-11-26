<?php
	include 'funcoes.php';
	addLike($_GET['cod']);
	echo('<meta http-equiv="refresh" content="0;url=detalhaJogo.php?cod='.$_GET['cod'].'">');

?>