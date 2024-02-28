<?php

require_once("../database.php");

 

$valor = $_GET['valor'];
 


  $sql = "SELECT * FROM usuarios WHERE usuario LIKE '%".$valor."%'"
;
  $consulta = $conexao->query($sql);
    $dados = $consulta->fetchALL(PDO::FETCH_ASSOC);

  
 
  
  echo ' <a href="insere.php" class="btn btn-warning">Insere</a>
</br>
</br>
  <table  width="500" border="1" class = "table-striped">';
  echo '<thead>';
  echo '<tr>';
  
  echo '<th width="150">Usuario</th><th>Nivel de Usuario</th><th width="200">Açoes</th>';
  
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  
  foreach($dados as $d){
	  echo '<tr><td align="center">'.$d['usuario'].'</td><td align="center">'.$d['nivel'].'</td><td><a class="btn btn-success" href="ver.php?id_user='.$d['id_user'].'">ver</a><a class="btn btn-primary" href = "alterar.php?id_user='.$d['id_user'].'"> alterar</a><a class="btn btn-danger"href = "deletar.php?id_user='.$d['id_user'].'"> deletar</a></td></tr>';
  }
  
  echo '</tbody>';
   echo '</table> ';
header("Content-Type: text/html; charset=ISO-8859-1",true);
?>