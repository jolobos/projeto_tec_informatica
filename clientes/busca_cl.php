<?php

require_once("../database.php");

 

$valor = $_GET['valor'];
 


  $sql = "SELECT * FROM clientes WHERE nome LIKE '%".$valor."%'"
;
  $consulta = $conexao->query($sql);
  
  echo '<div class="form-group"><a  class="btn btn-warning" href="insere.php">inserir</a></div>';
  
  
  echo '<table border="1" class="table-striped" >';
  echo '<thead>';
  echo '<tr>';
  
  echo '<th>Nome</th><th>CPF</th><th>Telefone</th><th>E-mail</th><th>Endereço</th><th>Açoes</th>';
  
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  
  while($d = $consulta->fetch(PDO::FETCH_ASSOC)){
	  echo '<tr><td>'.$d['nome'].'</td><td>'.$d['CPF'].'</td><td>'.$d['telefone'].'</td><td>'.$d['email'].'</td><td>'.$d['endereco'].
	  '</td><td><a class="btn btn-success "href = "ver.php?id_clientes='.$d['id_clientes'].'">ver</a><a class="btn btn-primary" href = "alterar.php?id_clientes='.$d['id_clientes'].'"> alterar</a><a class="btn btn-danger" href = "deletar.php?id_clientes='.$d['id_clientes'].'"> deletar</a></td></tr>';
  }
  
  echo '</tbody>';
   echo '</table>';
  
   
  
header("Content-Type: text/html; charset=ISO-8859-1",true);
?>