<?php
$nivel=1;
require_once('../verifica_session.php');
error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');

require_once('../database.php');
$id = $_GET['id_produto'];
$sql= 'SELECT * FROM produtos WHERE id_produto= ?';
$consulta = $conexao->prepare($sql);
$consulta->execute(array($id));
$dado = $consulta->fetch(PDO::FETCH_ASSOC);

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Ver Produto</title>
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
				<h1 class="text-info">
Ver Produtos				</h1>
			
      <h3 class="text-primary">Produto:</h3>      

<p>Codigo produto: <?php echo $dado['cod_prod'];?> </p>
<p>Produto: <?php echo $dado['produto'];?> </p>
<p>Valor: <?php echo '$ '.$dado['valor'];?> </p>
<p>Descricao: <?php echo $dado['descricao'];?> </p>

<a class="btn btn-success" href = "listagem_p.php">voltar</a>

<hr/>
		<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
		
		</div>
</div>
</body>
</html>
