<?php
  include "funcoes.php";
  addMedia($_GET['cod'],$_GET['id'], $_GET['media']);
  echo('<meta http-equiv="refresh" content="0;url=detalhaJogo.php?cod='.$_GET['cod'].'">');

?>
