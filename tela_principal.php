<?php
$nivel=1;

require_once('verifica_session.php');
error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');

try{
	$conexao = new PDO('mysql:host=localhost; dbname=projeto2', 'root','');
//host => endereço ip do servidor de banco de dados (ou localhost)
//dbname=> banco de dados que se que acessar
}catch(PDOException $e){
	$erro = $e ->getMessage();
	}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tela de escolha</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/scripts.js"></script>
</head>

<body>
<div class="container">
</br>
</br>
</br>
</br>
				<h1 class="text-info" align="center">
					Escolha de Telas
				</h1>






<div align="center">


<a class="btn btn-warning" href="clientes/listagem.php">Clientes</a></br></br>

  <a class="btn btn-warning" href="produtos/listagem_p.php">Produtos</a></br></br>

 <a class="btn btn-warning" href="usuarios/listagem.php">Usuarios</a> </br></br>

<a class="btn btn-warning" href="vendas/esc_cl.php">vendas</a> </br></br>

<a class="btn btn-warning" href="relatorios/index.php">relatorios</a></br></br>
  
  <a  class="btn btn-danger" href="sair.php  ">Sair</a></div> 


<hr/>
		<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
			
		</div>
</div>

</body>
</html>
