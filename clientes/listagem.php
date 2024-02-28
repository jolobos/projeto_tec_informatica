<?php
	$nivel=0;
require_once('../verifica_session.php');
error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');

require_once('../database.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Lista de Clientes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">  
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="func_cl.js"></script>
	<script type="text/javascript" src="../js/scripts.js"></script>
</head>

<body>
			<div class="container">
				<h1 class="text-info">
					Lista de Clientes
				</h1>
				</br>
		
 <div align="left" class="form-group">
  <a class="btn btn-danger" href="../tela_principal.php" >Tela principal</a></br></br>

<a href="../sair.php" class="btn btn-danger">Sair</a>
</div><h4>Buscar: <input type="text" id="busca"  onKeyUp="buscarprodutos(this.value)" />
</h4></br>
  <div id="resultado">


<?php
if(!empty($_GET['mensagem'])){
	echo $_GET['mensagem'];
}
?>



<?php

 if (!empty($erro)){
	 echo '<p> houve um problema no acesso ao banco de dados contate o administrador e diga que ocorreu o erro <b>'.$erro.'</b></p>';
 }
  
  $sql = 'SELECT * FROM clientes';
  $consulta = $conexao->query($sql);
  $dados = $consulta->fetchALL(PDO::FETCH_ASSOC);//disponibiliza os dados em forma de array
   
	/*	echo '<pre>';
   print_r($dados);
   '</pre>';
  */
              
        
  
  echo '<div class="form-group"><a  class="btn btn-warning" href="insere.php">inserir</a></div>';
  
  
  echo '<table border="1" class="table-striped" >';
  echo '<thead>';
  echo '<tr>';
  
  echo '<th>Nome</th><th>CPF</th><th>Telefone</th><th>E-mail</th><th>Endereço</th><th>Açoes</th>';
  
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  
  foreach($dados as $d){
	  echo '<tr><td>'.$d['nome'].'</td><td>'.$d['CPF'].'</td><td>'.$d['telefone'].'</td><td>'.$d['email'].'</td><td>'.$d['endereco'].
	  '</td><td><a class="btn btn-success " href = "ver.php?id_clientes='.$d['id_clientes'].'">ver</a><a class="btn btn-primary" href = "alterar.php?id_clientes='.$d['id_clientes'].'"> alterar</a><a class="btn btn-danger" href = "deletar.php?id_clientes='.$d['id_clientes'].'"> deletar</a></td></tr>';
  }
  
  echo '</tbody>';
   echo '</table>';
  
  
  ?>
<hr/>
		<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
			
		</div>
  </div> 
</div>

</body>
</html>
