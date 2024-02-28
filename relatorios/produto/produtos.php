<?php
require_once('../../verifica_session.php');
require_once('../../database.php');
error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');
$nivel=1;

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Relatórios de Produtos</title>

<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/style.css" rel="stylesheet">
	<script type="text/javascript" src="func_cl.js"></script>

</head>
<body>

<div class="container" >

<h1 class="text-info">Relatório de Venda dos Produtos</h1>

<a href="../../tela_principal.php" class="btn btn-danger">Tela principal</a>
<a href="../../sair.php" class="btn btn-danger">Sair</a>
<a href="../index.php" class="btn btn-danger">voltar</a>


</br>
</br>
<div align="center">
<h3 class="text-primary"> Selecione uma opção:</h3>
<a href="top10ano.php" class="btn btn-warning">Ranking anual</a></br></br>
<a href="top10mes.php" class="btn btn-warning">Ranking mensal</a></br></br>
<a href="top10dia.php" class="btn btn-warning">Ranking diario</a></br></br>
<a href="p_prod.php" class="btn btn-warning">Pesquisa por produto</a></br></br>
<a href="curvaABC.php" class="btn btn-warning">Curva ABC</a></br></br>

</div>

</div>
<div class="container"><hr/>
<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
		
		</div></div>
</body>