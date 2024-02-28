<?php
$nivel=0;
require_once('verifica_session.php');
error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');

try{
	$conexao = new PDO('mysql:host=localhost; dbname=projeto2', 'root','');
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
</br>
</br>
</br>
</br>
<div class="container">
				<h1 align="center" class="text-info">
					Escolha de Telas
				</h1>
	</br>		
	</br>		
	</br>		
			
<div align="center">


<a class="btn btn-warning" href="clientes/listagem.php">Clientes</a></br></br>

  <a class="btn btn-warning" href="vendas/esc_cl.php">vendas</a></br></br>
 
  <a class="btn btn-danger" href="sair.php">Sair</a></div> 

<hr/>
		<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
			
		</div>
  
</div>

</body>
</html>
