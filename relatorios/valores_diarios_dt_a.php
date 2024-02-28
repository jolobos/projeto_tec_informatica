	<?php
//require_once('../../verifica_session.php');
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

<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/style.css" rel="stylesheet">
<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/scripts.js"></script>
<script type="text/javascript" src="func_rl.js"></script>
	</head>
<body>

<div class="container">

<h1 class="text-info">Relatórios de Vendas</h1>

<a href="../../tela_principal.php" class="btn btn-danger">Tela principal</a>
<a href="../sair.php" class="btn btn-danger">Sair</a>
<a href="valores_diarios.php" class="btn btn-danger">Voltar</a>
</br>
</br>
<h3 class="text-info">Digite a data que você deseja pesquisar :</h3>
<form action="valores_diarios_dt_a.php" method="post" >

<select name="ano" class="label-success">
<option value="">ANO</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
</select>
<input type="submit" class="btn btn-success" value="pesquisar"/>
</form>
<h3 class="text-info">Totais de vendas por dia	:</h3>
<div id="resultado">
<?php
	
if(empty($_POST['ano'])){
		
		echo '</br><a class="alert alert-danger">nenhuma data selecionada!</a>';
		
	}else{
	
	$ano = $_POST['ano'];

		$dt_inicio = date_format(new DateTime($ano."-01-01"), "Y/m/d H:i:s");
	$dt_final = date_format(new DateTime($ano."-12-31"), "Y/m/d H:i:s");
	
	
	$sql = "	SELECT month(data) AS mes,SUM(total) AS total 
	from vendas WHERE data BETWEEN '".$dt_inicio."' and '".$dt_final."' 
	GROUP BY MONTH(data)";
$consulta = $conexao->query($sql);

$lr2 = $consulta->fetchALL(PDO::FETCH_ASSOC);

if(empty($lr2)){
	echo '<table width="500" border="1">
<tr><th align="center" class="alert-success">Vendas de '.date_format(new DateTime($dt_inicio), "d/m/Y").' até '.date_format(new DateTime($dt_final), "d/m/Y").'</th></tr>
<tr><th align="center" class="alert-danger">Nenhuma venda efetuada nesse periodo</th></tr>
</table>
';
	
	
}else{
	
echo'	<table  border="1" align="center">
<tr><th align="center" class="alert-success" colspan="5">valores arrecadados !!!!</th></tr>
<tr>
    
    <th scope="col">datas pesquisadas </th>
    <th scope="col">totais mensais</th>
    <th scope="col">totais acumulados</th>
    <th scope="col">percentual</th>
    <th scope="col">percentual acumulado</th>

</tr>';
	$sql1 = "SELECT month(data) AS mes,SUM(total) AS total1 
	from vendas WHERE data BETWEEN '".$dt_inicio."' and '".$dt_final."' 
	GROUP BY MONTH(data)";
$consulta1 = $conexao->prepare($sql1);
$consulta1->execute(array());
$lr1 = $consulta1->fetchALL(PDO::FETCH_ASSOC);
$vl_somado=0;
$vl_somado1 =0;
$vl_ss = 0;
$vl_perc = 0;
$vl_perc_ac=0;
foreach($lr1 as $l1){
	$vl_somado1 += $l1['total1'];
	
}
foreach($lr1 as $l){
	$vl_somado += $l['total1'];
	$vl_ss = $l['total1']/$vl_somado1;
	$vl_perc = $vl_ss * 100;
	$vl_perc_ac += $vl_perc;
	echo '<tr><td align="center">'.$l['mes'].'/'.$ano.'</td>
	<td align="center">$ '.$l['total1'].'</td>
	<td align="center">$ '.$vl_somado.'</td>
		<td align="center">'.number_format($vl_perc,2).'%</td>
		<td align="center">'.number_format($vl_perc_ac,2).'%</td></tr>';
	
}

echo '<tr><td colspan="5" align="right">TOTAL: $ '.$vl_somado.'</td></tr>
</table>';
}}









?>
</div>
</div><div class="container"><hr/>
<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
		
		</div></div>

</body>	