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
<title>Relatórios de Vendas</title>

<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/style.css" rel="stylesheet">
<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/scripts.js"></script>

	</head>
<body>

<div class="container">

<h1 class="text-info">Relatórios de Vendas</h1>

<a href="../../tela_principal.php" class="btn btn-danger">Tela principal</a>
<a href="../../sair.php" class="btn btn-danger">Sair</a>
<a href="../usuario/usuarios.php" class="btn btn-danger">Voltar</a>
</br>
</br>
<div>
<form action="top10ano.php" method="post">


<select name="ano" class="label-success">
<option value="">ANO</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
</select>
<input type="submit" class="btn btn-success" value="pesquisar"/>
</form>

<h3 class="text-info">Resultado:</h3>
</br>

<?php 




	if(empty($_POST['ano'])){
		
		echo '<a class="alert alert-danger">nenhuma data selecionada!</a>';
		
	}else{
	
	$ano = $_POST['ano'];
	
	$dt_inicio = date_format(new DateTime($ano."-01-01 "), "Y/m/d H:i:s");
	$dt_final = date_format(new DateTime($ano."-12-31 "), "Y/m/d H:i:s");
	
		$sql = "SELECT data FROM vendas WHERE data BETWEEN '".$dt_inicio."' and '".$dt_final."' ";
	$consulta = $conexao->prepare($sql);
	$consulta->execute(array());
	$lr200 = $consulta->fetch(PDO::FETCH_ASSOC);
		
if(empty($lr200)){
	echo '<table width="500" border="1">
<tr><th align="center" class="alert-success">Vendas de '.$ano.'</th></tr>
<tr><th align="center" class="alert-danger">Nenhuma venda efetuada nesse periodo</th></tr>
</table>
';
	
	
}else{
echo '
<h3 class="text-primary">Vendas de '.$ano.'</h3>
<table  border="1">
<tr><th align="center" class="alert-success" colspan="2">Ranking dos Vendedores!!!!</th></tr>
<tr>
    <th scope="col">Nome do vendedor</th>
    <th scope="col">numero de vendas no ano</th>
    
    
</tr>';

	$sql = "SELECT id_usuario, COUNT(id_usuario) AS q FROM vendas WHERE data BETWEEN '".$dt_inicio."' and '".$dt_final." '
	GROUP BY id_usuario ORDER BY q DESC ";
	$consulta = $conexao->prepare($sql);
	$consulta->execute(array());
	$lr2 = $consulta->fetchALL(PDO::FETCH_ASSOC);
	
	foreach($lr2 as $l){
			
		$sql4 = "SELECT * FROM usuarios WHERE id_user = ? ";
		$consulta4 = $conexao->prepare($sql4);
        $consulta4->execute(array($l['id_usuario']));
		$dados_us = $consulta4->fetch(PDO::FETCH_ASSOC);
		
	if($l['q'] >0){	
	
	echo '<tr><td align="center">'.$dados_us['usuario']	.'</td><td  align="center">'.$l['q'].'</td></tr>'	;
	}
	

	
	}
	echo '</table>';

}}
	
?>

</div>


</div>
<div class="container"><hr/>
<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
			
		</div></div>
</body>