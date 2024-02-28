<?php

require_once("../../database.php");
$valor = $_GET['valor'];
$sql = "SELECT * FROM clientes WHERE nome LIKE '%".$valor."%'";
$consulta = $conexao->query($sql);
//$consulta->execute(array());
$lr1 = $consulta->fetchALL(PDO::FETCH_ASSOC);


 echo '
 
 <table class = "table-striped" border="1">';
  echo '<thead>';
  echo '<tr>';
  
  echo '<th>Clientes</th><th>CPF</th><th>Açoes</th>';
  
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  
  foreach($lr1 as $d){
	  
	   echo '<tr><td>'.$d['nome'].'</td><td>'.$d['CPF'].'</td><td> 
	  <form action="p_clientes.php" method="post">
	  <input type="hidden" name="id_clientes" class="btn btn-success" value="'.$d['id_clientes'].'"/>
	  <input type="submit" class="btn btn-success"value="Pesquisar"/></form></td></tr>';
  }
  
  echo '</tbody>';
   echo '</table>';
header("Content-Type: text/html; charset=ISO-8859-1",true);

?>