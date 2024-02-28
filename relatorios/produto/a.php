<?php 
require_once('../../verifica_session.php');
$nivel=1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Relatorios!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="../img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="../img/favicon.png">
  
	<script type="text/javascript" src="../../js/jquery.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../js/scripts.js"></script>
</head>

<body>

<div class="container">

	<?php error_reporting(E_ALL);
		ini_set('display_errors','on');
		require_once ('../../database.php');
		
	$dt_inicio = date_format(new DateTime($_POST['dt_inicio']), "Y/m/d H:i:s");
	$dt_final = date_format(new DateTime($_POST['dt_final']), "Y/m/d H:i:s");
	$dt_inicio2 = date_format(new DateTime($_POST['dt_inicio']), "d/m/Y");
	$dt_final2 = date_format(new DateTime($_POST['dt_final']), "d/m/Y");
			
		$sql ='select * from produtos';
		$sql1="SELECT p.produto,p.valor,COUNT(iv.id_produto) AS quan,SUM(iv.quantidade) AS q,
	(p.valor * SUM(iv.quantidade)) AS r
FROM itens_venda iv
left join produtos p
on p.id_produto = iv.id_produto
WHERE data_prod BETWEEN '".$dt_inicio."' and '".$dt_final."'
GROUP BY iv.id_produto ORDER BY r DESC";
		$consulta1 = $conexao->prepare($sql1);
		$consulta1->execute();
		$d = $consulta1->fetchAll(PDO::FETCH_ASSOC);
		
		$dg = array();
		
		$soma_total=0;
$soma_total1=0;
$valor_acumulado3=0;
foreach($d as $l12){
$soma_total1 +=$l12['r'];
$desc = array();
}

foreach($d as $l1){
	
	
		$vlr_somado = $l1['valor'] * $l1['q'];

	$soma_total +=$l1['r'];
	
	$valor_acumulado = $vlr_somado/$soma_total1;
	$valor_acumulado2 = $valor_acumulado * 100;
	
	$valor_acumulado3 += $valor_acumulado2;

		
		
		
	$desc[] = array ("s"=>number_format($valor_acumulado2,2),"l"=>number_format($valor_acumulado3,2),"Lan"=>$l1['produto']);
			
		$dg[] = array("Lan"=>$l1['produto'], "2012"=>$valor_acumulado2,"2013"=>$valor_acumulado3);
		
				}
				
			rsort($desc);
		
			
		$dataText1= json_encode($dg);
	$dataText2= json_encode($desc);
	

		
	
		
		
		
		?>
			
			<h1 class="text-info">Relatórios de Produtos</h1>

<a href="../../tela_principal.php" class="btn btn-danger">Tela principal</a>
<a href="../../sair.php" class="btn btn-danger">Sair</a>
<a href="curvaABC.php" class="btn btn-danger">Voltar</a>
			<h1 class="text-primary"> Curva ABC</h1>
			<h3 class="text-primary">Gráfico de <?php echo $dt_inicio2.' até '.$dt_final2?></h3> 
			
			
			<div id ="myfirstchart" style="height:250px;"></div>
			
	
</div>
<script src="../js/raphael.js" type="text/javascript"></script>
<script src="../js/morris.js" type="text/javascript"></script>
<script type="text/javascript">
var dados= <?php echo $dataText2; ?>;
new Morris.Bar({
	element: 'myfirstchart',
	data: dados,
	xkey:['Lan'],
	ykeys: ['l','s'],
labels: ['porcentagem acumulada', 'porcentagem por produto']});
</script>



</body>
</html>
