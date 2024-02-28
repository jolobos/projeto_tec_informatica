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
<a href="../vendas.php" class="btn btn-danger">Voltar</a>
</br>
</br>
<div >
<form action="v_mensais.php" method="post">
<select name="mes" class="label-success">
<option value="" >MES</option>
<option value="01">janeiro</option>
<option value="02">fevereiro</option>
<option value="03">março</option>
<option value="04">abril</option>
<option value="05">maio</option>
<option value="06">junho</option>
<option value="07">julho</option>
<option value="08">agosto</option>
<option value="09">setembro</option>
<option value="10">outubro</option>
<option value="11">novembro</option>
<option value="12">dezembro</option>
</select>

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




	if(empty($_POST['mes']) or empty($_POST['ano'])){
		
		echo '<a class="alert alert-danger">nenhuma data selecionada!</a>';
		
	}else{
	
	$ano = $_POST['ano'];
	$mes = $_POST['mes'];
	
	$dt_inicio = date_format(new DateTime($ano."-".$mes."-01 "), "Y/m/d H:i:s");
	$dt_final = date_format(new DateTime($ano."-".$mes."-31 "), "Y/m/d H:i:s");
	$sql = "SELECT * FROM vendas WHERE data BETWEEN '".$dt_inicio."' and '".$dt_final."'";
	//".$ano."'-'".$mes."'-01' and '".$ano."'-'".$mes."'-31' ";
$consulta = $conexao->query($sql);

$lr2 = $consulta->fetchALL(PDO::FETCH_ASSOC);

if(empty($lr2)){
	echo '<table width="500" border="1">
<tr><th align="center" class="alert-success" colspan="4">Vendas de '.$mes.' de '.$ano.'</th></tr>
<tr><th align="center" class="alert-danger" colspan="4">Nenhuma venda efetuada nesse periodo</th></tr>
</table>
';
	
	
}else{
echo '
<h3 class="text-primary">Vendas de '.$mes.' de '.$ano.'</h3>
<table  border="1">
<tr><th align="center" class="alert-success" colspan="4">Vendas de '.$mes.' de '.$ano.'</th></tr>
<tr>
    <th scope="col">Nome do cliente</th>
    <th scope="col">Data da Compra</th>
    <th scope="col">nome do vendedor</th>
    <th scope="col">Ações</th>
    
</tr>';
foreach($lr2 as $lr){
	$id3 = $lr['id_usuario'] ;
	$id2 = $lr['id_cliente'];
	
	$sql2 = "SELECT * FROM clientes WHERE id_clientes = ?";
		$consulta2 = $conexao->prepare($sql2);
        $consulta2->execute(array($id2));
		$dados_cl = $consulta2->fetch(PDO::FETCH_ASSOC);	
		$cliente = $dados_cl['nome'];
		
		$sql4 = "SELECT * FROM usuarios WHERE id_user = ?";
		$consulta4 = $conexao->prepare($sql4);
        $consulta4->execute(array($id3));
		$dados_us = $consulta4->fetch(PDO::FETCH_ASSOC);	
	
	echo '<tr><td align="center">'.$cliente.'</td><td  align="center">'.date_format(new DateTime($lr['data']), "d/m/Y H:i:s").'</td>
	<td  align="center">'.$dados_us['usuario'].'</td><td><form action="../gera_pdf.php" method="post" target="_blank">
	<input type="hidden" name="id_venda" value="'.$lr['id_venda'].'"/>
	<input class="btn btn-success" type="submit" value="Visualizar"/></form></td></tr>';}
	echo '</table></hr>';



}}

?>

</div>
</div>
<div class="container"><hr/>
<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
			
		</div></div>
</body>