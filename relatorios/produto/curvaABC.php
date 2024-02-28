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
<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/scripts.js"></script>

	</head>
<body>

<div class="container">

<h1 class="text-info">Relatórios de Produtos</h1>

<a href="../../tela_principal.php" class="btn btn-danger">Tela principal</a>
<a href="../../sair.php" class="btn btn-danger">Sair</a>
<a href="produtos.php" class="btn btn-danger">Voltar</a>
</br>
</br>
<div>
<form action="curvaABC.php" method="post">
<input type="date" name="dt_inicio" />
<a > até</a>
<input type="date" name="dt_final" />
<input type="submit" class="btn btn-success" value="pesquisar"/>
</form>

<h3 class="text-info">Resultado:</h3>
</br>

<?php 




	if(empty($_POST['dt_inicio']) or empty($_POST['dt_final'])){
		
		echo '<a class="alert alert-danger">nenhuma data selecionada!</a>';
		
	}else{
	
		

	$dt_inicio = date_format(new DateTime($_POST['dt_inicio']), "Y/m/d H:i:s");
	$dt_final = date_format(new DateTime($_POST['dt_final']."23:59:59"), "Y/m/d H:i:s");
	$dt_inicio2 = date_format(new DateTime($_POST['dt_inicio']), "d/m/Y");
	$dt_final2 = date_format(new DateTime($_POST['dt_final']), "d/m/Y");
	
		$sql = "SELECT id_venda FROM vendas WHERE data BETWEEN '".$dt_inicio."' and '".$dt_final."' ";
	$consulta = $conexao->prepare($sql);
	$consulta->execute(array());
	$lr200 = $consulta->fetchALL(PDO::FETCH_ASSOC);
		
if(empty($lr200)){
	echo '<table width="500" border="1">
<tr><th align="center" class="alert-success">Vendas de </th></tr>
<tr><th align="center" class="alert-danger">Nenhuma venda efetuada nesse periodo</th></tr>
</table>
';
	
	
}else{
echo '
<h3 class="text-primary">Vendas de '.$dt_inicio2.' até '.$dt_final2.' </h3>
<table  border="1" align="center">
<tr><th align="center" class="alert-success" colspan="7">Ranking de produtos no mes!!!!</th></tr>
<tr>
    <th scope="col">Nome do produto</th>
    <th scope="col">quantidade vendida</th>
        <th scope="col">Valor do produto</th>
		    <th scope="col">Valor somado</th>
		    <th scope="col">Valor acumulado</th>
		    <th scope="col">Percentual</th>
			<th scope="col">Perc. acumulado</th>


    
</tr>';

	$sql1 = "SELECT p.produto,p.valor,COUNT(iv.id_produto) AS quan,SUM(iv.quantidade) AS q,
	(p.valor * SUM(iv.quantidade)) AS r
FROM itens_venda iv
left join produtos p
on p.id_produto = iv.id_produto
WHERE data_prod BETWEEN '".$dt_inicio."' and '".$dt_final."'
GROUP BY iv.id_produto ORDER BY q DESC ";
	$consulta1 = $conexao->prepare($sql1);
	$consulta1->execute(array());
	$lr2 = $consulta1->fetchALL(PDO::FETCH_ASSOC);
	
$soma_total=0;
$soma_total1=0;
$valor_acumulado3=0;
foreach($lr2 as $l12){
$soma_total1 +=$l12['r'];


}
foreach($lr2 as $l1){

	$vlr_somado = $l1['valor'] * $l1['q'];

	$soma_total +=$l1['r'];
	
	$valor_acumulado = $vlr_somado/$soma_total1;
	$valor_acumulado2 = $valor_acumulado * 100;
	$valor_acumulado3 += $valor_acumulado2; 
	
			echo '<tr><td align="center">'.$l1['produto']	.'</td><td  align="center">'.$l1['q'].'</td>
			<td  align="center">$ '.number_format($l1['valor'],2).'</td><td  align="center">$ '.number_format($vlr_somado,2).'</td>
			<td  align="center">$ '.number_format($soma_total,2).'</td>
			<td  align="center">'.number_format($valor_acumulado2,2,".",",").'%</td>
			<td  align="center">'.number_format($valor_acumulado3,2,".",",").'%</td></tr>';

	
	 
	}}

	if(!empty($lr200)){
		echo '<tr><td colspan="7" align="right"> TOTAL: $ '.number_format($soma_total,2).'</td></tr>';
		}
		echo '</table>';
		
		
		
		
		

	}
	
	
	

	
?>


</div>
</div>
</br>
<div align="center" class="container">
<?php
if(!empty($lr200)){
echo '<form action="a.php" method="post" >
		<input type="hidden" name="dt_inicio" value="'.$dt_inicio.'">
		<input type="hidden" name="dt_final" value="'.$dt_final.'">
		<input type="submit" class="btn btn-success" value="Visualizar em grafico">
		</form>
		
		
';}
?>
</div>
<div class="container"><hr/>
<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
			
		</div></div>
		

</body>