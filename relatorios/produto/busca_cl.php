<?php

require_once("../../database.php");
$valor = $_GET['valor'];
$sql = "SELECT * FROM produtos WHERE produto LIKE '%".$valor."%'";
$consulta = $conexao->query($sql);
//$consulta->execute(array());
$lr1 = $consulta->fetchALL(PDO::FETCH_ASSOC);


 echo '
 
 <table class = "table-striped" border="1">';
  echo '<thead>';
  echo '<tr>';
  
  echo '<th>produto</th><th>Açoes</th>';
  
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  
  foreach($lr1 as $d){
	  
	   echo '<tr><td>'.$d['produto'].'</td><td> 
	  <form action="p_prod.php" method="post">
	  <input type="hidden" name="id_produto" class="btn btn-success" value="'.$d['id_produto'].'"/>
	  <input type="submit" class="btn btn-success"value="Pesquisar"/></form></td></tr>';
  }
  
  echo '</tbody>';
   echo '</table>';
header("Content-Type: text/html; charset=ISO-8859-1",true);

?>