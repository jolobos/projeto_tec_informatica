<?php

require_once("../database.php");

 

$valor = $_GET['valor'];
 


  $sql = "SELECT * FROM clientes WHERE nome LIKE '%".$valor."%'"
;
  $consulta = $conexao->query($sql);
  

 








	echo '<table width="1000" border="1" align="left">
<tr>
    <th scope="col">Nome</th>
    <th scope="col">CPF</th>
    <th scope="col">Telefone</th>
     <th scope="col">E-mail</th>
	 <th scope="col">Endereço</th>
	 <th scope="col">Ações</th>
  </tr>';
  while($lr = $consulta->fetch(PDO::FETCH_ASSOC)){
	echo '<tr><td>Nome: '.$lr['nome'].'</td><td> CPF: '.$lr['CPF'].'</td><td> Telefone: '.$lr['telefone'].' </td><td>E-mail: '.$lr['email'].'</td><td>Endereço: '.$lr['endereco'].'</td><td><a class="btn btn-success" href="esc_cl.php?act_cl=add_cl&id_clientes='.$lr['id_clientes'].'">Selecionar</a></td></tr>';}
	echo '</table></hr>';
	
	





header("Content-Type: text/html; charset=ISO-8859-1",true);
?>