<?php

require_once("../../database.php");
$valor = $_GET['valor'];
$sql = "SELECT * FROM usuarios WHERE usuario LIKE '%".$valor."%'";
$consulta = $conexao->query($sql);
//$consulta->execute(array());



 echo '
 
 <table class = "table-striped" border="1">';
  echo '<thead>';
  echo '<tr>';
  
  echo ' <th scope="col">nome do usuario </th>
    <th scope="col">nivel</th>
    
	<th scope="col">Ações</th>';
  
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  
  while($d = $consulta->fetch(PDO::FETCH_ASSOC)){
	  
	   echo '<tr><td>'.$d['usuario'].'</td><td>'.$d['nivel'].'</td><td>
	<form action="p_usuario.php" method="post">
	  <input type="hidden" name="id_usuarios" class="btn btn-success" value="'.$d['id_user'].'"/>
	  <input type="submit" class="btn btn-success"value="Pesquisar"/></form></td></tr>';
  }
  
  echo '</tbody>';
   echo '</table>';
header("Content-Type: text/html; charset=ISO-8859-1",true);

?>