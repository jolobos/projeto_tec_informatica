<?php
	$nivel=0;
require_once('../verifica_session.php');
error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');

require_once('../database.php');
$id = $_GET['id_clientes'];
$sql= 'SELECT * FROM clientes WHERE id_clientes= ?';
$consulta = $conexao->prepare($sql);
$consulta->execute(array($id));
$dado = $consulta->fetch(PDO::FETCH_ASSOC);

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Visualizar Clientes</title>
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
					Ver Clientes
				</h1>
                </br>
                </br>
    <div align="left" class="form-group">
  <a class="btn btn-danger" href="../tela_principal.php">Tela principal</a></br></br>
<a href="../sair.php" class="btn btn-danger">Sair</a>

</br>
    <h3 class="text-primary">Cliente</h3><hr/>
<p>Nome: <?php echo $dado['nome'];?> </p>
<p>CPF: <?php echo $dado['CPF'];?> </p>
<p>Telefone: <?php echo $dado['telefone'];?> </p>
<p>E-mail: <?php echo $dado['email'];?> </p>

   

<a  href = "listagem.php" class="btn btn-success ">voltar</a>
</div>
<hr/>
		<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
			
		</div>
</div>

</body>
</html>
