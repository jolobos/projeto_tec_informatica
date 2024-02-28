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
<title>Relatórios de Clientes</title>
<script type="text/javascript" src="funcs.js"></script>

<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/style.css" rel="stylesheet">
</head>
<body>


<div class="container">

<h1 class="text-info">Relatórios</h1>

<a href="../../tela_principal.php" class="btn btn-danger">Tela principal</a>
<a href="../../sair.php" class="btn btn-danger">Sair</a>
<a href="usuarios.php" class="btn btn-danger">voltar</a>
</br>
</br>

<div>

<?php

$lr1 = $_POST['id_usuarios'];

	
		$sql2 = "SELECT * FROM vendas WHERE id_usuario = ?";
		$consulta2 = $conexao->prepare($sql2);
        $consulta2->execute(array($lr1));
	$lr2 = $consulta2->fetch(PDO::FETCH_ASSOC);

if(empty($lr2)){
	
	
echo '
</br>
<a class="alert alert-danger">Lamento mas seu usuario não possui nenhuma venda registrada.</a>';


	}else{
	
echo '<h3 class="text-primary"> Vendas efetuadas pelo usuario: </h3>
<table  border="1">
<tr>
    
    <th scope="col">nome do usuario </th>
    <th scope="col">data da venda</th>
    <th scope="col">nome do cliente</th>
	<th scope="col">Ações</th>
</tr>';
	while($lr = $consulta2->fetch(PDO::FETCH_ASSOC)){
	$id3 = $lr['id_usuario'];
	$id = $lr['id_cliente'];
		
		
		$sql = "SELECT * FROM clientes WHERE id_clientes = ?";
		$consulta = $conexao->prepare($sql);
        $consulta->execute(array($id));
		$d = $consulta->fetch(PDO::FETCH_ASSOC);	
	
	
		
		
		$sql4 = "SELECT * FROM usuarios WHERE id_user = ?";
		$consulta4 = $conexao->prepare($sql4);
        $consulta4->execute(array($id3));
		$dados_us = $consulta4->fetch(PDO::FETCH_ASSOC);	
	
		
	
	echo '<tr><td align="center">'.$dados_us['usuario'].'</td><td  align="center">'.date_format(new DateTime($lr['data']), "d/m/Y H:i:s").'</td>
	<td  align="center">'.$d['nome'].'</td><td><form action="../gera_pdf.php" method="post" target="_blank">
	<input type="hidden" name="id_venda" value="'.$lr	['id_venda'].'"/>
<input class="btn btn-success" type="submit" value="Visualizar"/></form></td></tr>'; 

}

echo '</table>';}		

?>
</div>
</div>
<div class="container"><hr/>
<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
			
		</div></div>
</body>