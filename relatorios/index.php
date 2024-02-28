<?php
require_once('../verifica_session.php');
require_once('../database.php');
error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');
$nivel=1;

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Relatórios de Vendas</title>

<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/scripts.js"></script>

	</head>
<body>

<div class="container">

<h1 class="text-info">Relatórios de Vendas</h1>

<a href="../tela_principal.php" class="btn btn-danger">Tela principal</a></br></br>
<a href="../sair.php" class="btn btn-danger">Sair</a>
<div align="center">
<h3 class="text-primary">Escolha uma opção de relatório: </h3>
<a href="vendas.php" class="btn btn-info">Vendas</a></br></br>
<a href="cliente/clientes.php" class="btn btn-info">Clientes</a></br></br>
<a href="usuario/usuarios.php" class="btn btn-info">usuarios</a></br></br>
<a href="produto/produtos.php" class="btn btn-info">Produtos</a></br></br>
<a href="valores_diarios.php" class="btn btn-info">Valores p/ dia</a></br></br>

</div>
<hr/>
		<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
		
		</div>
</div>

</body>