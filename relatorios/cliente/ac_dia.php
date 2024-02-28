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
<title>Relatórios de vendas</title>

<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/style.css" rel="stylesheet">
<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/scripts.js"></script>

	</head>
<body>

<div class="container">

<h1 class="text-info">Relatórios de Produtos</h1>

<a href="../../tela_principal.php" class="btn btn-danger">Tela principal</a>
<a href="../../sair.php" class="btn btn-danger">Sair</a>
<a href="clientes.php" class="btn btn-danger">Voltar</a>
</br>
</br>
<div>
<form action="ac_dia.php" method="post">
<input type="date" name="ano">
<input type="submit" class="btn btn-success" value="pesquisar"/>
</form>

<h3 class="text-info">Resultado:</h3>
</br>

<?php 




	if(empty($_POST['ano'])){
		
		echo '<a class="alert alert-danger">nenhuma data selecionada!</a>';
		
	}else{
	$ano = $_POST['ano'];
	
	$dt_inicio = date_format(new DateTime($ano), "Y/m/d H:i:s");
	$dt_final = date_format(new DateTime($ano. " 23:59:59"), "Y/m/d H:i:s");
	
	
		$sql = "SELECT id_venda FROM vendas WHERE data BETWEEN '".$dt_inicio."' and '".$dt_final."' ";
	$consulta = $conexao->prepare($sql);
	$consulta->execute(array());
	$lr200 = $consulta->fetchALL(PDO::FETCH_ASSOC);
		
if(empty($lr200)){
	echo '<table width="500" border="1">
<tr><th align="center" class="alert-success" colspan="6">Vendas de '.$ano.'</th></tr>
<tr><th align="center" class="alert-danger" colspan="6">Nenhuma venda efetuada nesse periodo</th></tr>
</table>
';
	
	
}else{
	$dt_inicio2 = date_format(new DateTime($ano), "d/m/Y");
	$dt_final2 = date_format(new DateTime($ano), "d/m/Y");
	
	
echo '<h3 class="text-primary">Vendas de '.$dt_inicio2.' até '.$dt_final2.' </h3>
<table  border="1" align="center">
<tr><th align="center" class="alert-success" colspan="6">Ranking de produtos no ano!!!!</th></tr>
<tr>
    <th scope="col">Nome do cliente</th>
    <th scope="col">compras efetuadas</th>
        <th scope="col">Valor das compras</th>
		    <th scope="col">valor acumulado</th>
		    <th scope="col">Percentual</th>
			<th scope="col">Perc. acumulado</th>


    
</tr>';

	$sql1 = "SELECT p.nome,iv.id_cliente,iv.total,COUNT(iv.id_cliente) AS cl,SUM(total) AS t,	iv.id_venda 
	FROM vendas iv left join clientes p 
	on p.id_clientes = iv.id_cliente 
	WHERE data BETWEEN '".$dt_inicio."' and '".$dt_final."' GROUP BY iv.id_cliente ORDER BY t DESC";
	$consulta1 = $conexao->prepare($sql1);
	$consulta1->execute(array());
	$lr2 = $consulta1->fetchALL(PDO::FETCH_ASSOC);
	
$soma_total=0;
$soma_total1=0;
$valor_acumulado3=0;
foreach($lr2 as $rr){
	$soma_total1 +=$rr['t'];
}
	
foreach($lr2 as $l1){
	$vlr_somado = $l1['t'];

	$soma_total +=$l1['t'];
	
	$valor_acumulado = $vlr_somado/$soma_total1;
	$valor_acumulado2 = $valor_acumulado * 100;
	$valor_acumulado3 += $valor_acumulado2; 
	
			echo '<tr><td align="center">'.$l1['nome']	.'</td><td  align="center">'.$l1['cl'].'</td>
			<td  align="center">$ '.number_format($l1['t'],2).'</td>
			<td  align="center">$ '.number_format($soma_total,2).'</td>
			<td  align="center">'.number_format($valor_acumulado2,2,".",",").'%</td>
			<td  align="center">'.number_format($valor_acumulado3,2,".",",").'%</td></tr>';

	
	 
}}
if(!empty($lr200)){
		echo '<tr><td colspan="6" align="right"> TOTAL: $ '.number_format($soma_total,2).'</td></tr>';
		}
	

		echo '</table>';

	}
	
	

?>

</div>
</div>
<div class="container"><hr/>
<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
			
		</div></div>
</body>