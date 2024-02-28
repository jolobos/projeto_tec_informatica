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
<script type="text/javascript" src="funcs.js"></script>

<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/style.css" rel="stylesheet">
	<script type="text/javascript" src="func_cl.js"></script>

</head>
<body>


<div class="container">

<h1 class="text-info">Relatório de venda de produtos</h1>

<a href="../../tela_principal.php" class="btn btn-danger">Tela principal</a>
<a href="../../sair.php" class="btn btn-danger">Sair</a>
<a href="produtos.php" class="btn btn-danger">voltar</a>
</br>
</br>

<h3 class="text-primary"> Selecione um produto:</h3>
<p>Buscar: 
<input type="text" id="busca"  onKeyUp="buscar_cliente(this.value)" /></p>
</br>
<div id="resultado">

</div>
<div>

<?php
if(!empty($_POST['id_produto'])){
	
	
	
	
$lr1 = $_POST['id_produto'];
$sql1 = "SELECT p.produto,p.valor,COUNT(iv.id_produto) AS quan,SUM(iv.quantidade) AS q,
	(p.valor * SUM(iv.quantidade)) AS r
FROM itens_venda iv
left join produtos p
on p.id_produto = iv.id_produto
WHERE iv.id_produto = ?
GROUP BY iv.id_produto ";
	$consulta1 = $conexao->prepare($sql1);
	$consulta1->execute(array($lr1));
	$lr3 = $consulta1->fetch(PDO::FETCH_ASSOC);
		
	
if(empty($lr3['q'])){
	
	
echo '<a class="alert alert-danger">Lamento mas seu produto não possui nenhuma compra registrada.</a>';


	}else{
		

	echo '<h3 class="text-primary">Vendas por produto </h3>
<table  border="1" align="center">
<tr><th align="center" class="alert-success" colspan="7">Pesquisa de vendas por produto!!!!</th></tr>
<tr>
    <th scope="col">Nome do produto</th>
    <th scope="col">quantidade vendida</th>
        <th scope="col">Valor do produto</th>
		    <th scope="col">Valor somado</th>
		    <th scope="col">Valor acumulado</th>



   
</tr>';
$sql1 = "SELECT p.produto,p.valor,COUNT(iv.id_produto) AS quan,SUM(iv.quantidade) AS q,
	(p.valor * SUM(iv.quantidade)) AS r
FROM itens_venda iv
left join produtos p
on p.id_produto = iv.id_produto
WHERE iv.id_produto = ?
GROUP BY iv.id_produto ";
	$consulta1 = $conexao->prepare($sql1);
	$consulta1->execute(array($lr1));
	$lr2 = $consulta1->fetchALL(PDO::FETCH_ASSOC);

	$soma_total=0;
$soma_total1=0;


foreach($lr2 as $l12){
$soma_total1 +=$l12['r'];


}
foreach($lr2 as $l1){

	$vlr_somado = $l1['valor'] * $l1['q'];

	$soma_total +=$l1['r'];
	

	
			echo '<tr><td align="center">'.$l1['produto']	.'</td><td  align="center">'.$l1['q'].'</td>
			<td  align="center">$ '.$l1['valor'].'</td><td  align="center">$ '.number_format($vlr_somado,2).'</td>
			<td  align="center">$ '.number_format($soma_total,2).'</td>
			</tr>';

	
	 
	}}

		echo '<tr><td colspan="7" align="right"> TOTAL: $ '.number_format($soma_total,2).'</td></tr>';
		
	


echo '</table>';}	

?>
</div>
</div><div class="container"><hr/>
<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
			
		</div></div>
</body>