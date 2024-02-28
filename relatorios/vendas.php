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
<title>Relatórios</title>
<script type="text/javascript" src="funcs.js"></script>

<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
</head>
<body>

<div class="container">

<h1 class="text-info">Relatórios</h1>
<a href="../tela_principal.php" class="btn btn-danger">Tela principal</a>
<a href="../sair.php" class="btn btn-danger">Sair</a>
<a href="index.php" class="btn btn-danger">Voltar</a>

<a href="venda/v_anuais.php" class="btn btn-warning">Vendas anuais</a>
<a href="venda/v_mensais.php" class="btn btn-warning">Vendas mensais</a>
<a href="venda/v_dia.php" class="btn btn-warning">Vendas do dia</a>
<a href="venda/pes_venda.php" class="btn btn-warning">Pesquisar venda</a>

<h3 class="text-primary">Digite a data que você deseja pesquisar:</h3>
<?php
	header("Content-Type: text/html; charset=utf-8",true);



echo '<form  action="vendas.php" method="post">
<input type="date" name="dt_inicio" />
<a> até </a>
<input type="date" name="dt_final" />
<input type="submit" class="btn btn-success" value="pesquisar"/>

';
echo "</form>";



echo '<h3 class="text-primary">Resultado:</h3></br>';

if(empty($_POST['dt_inicio'])){
	
	echo '<a class="alert alert-danger">nenhuma data selecionada!</a>';
	
}else{
	
$dt_inicio = date_format(new DateTime($_POST['dt_inicio']), "Y/m/d H:i:s");
$dt_final = date_format(new DateTime($_POST['dt_final']."23:59:59" ), "Y/m/d H:i:s");

$sql = "SELECT * FROM vendas WHERE data BETWEEN '".$dt_inicio."' and '".$dt_final."'";
$consulta = $conexao->query($sql);


echo '

<table  border="1" >
<tr>
    <th scope="col">Nome do cliente</th>
    <th scope="col">Data da Compra</th>
    <th scope="col">nome do vendedor</th>
    <th scope="col">Ações</th>
    
</tr>';
while($lr = $consulta->fetch(PDO::FETCH_ASSOC)){
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
	<td  align="center">'.$dados_us['usuario'].'</td><td><form action="gera_pdf.php" method="post" target="_blank">
	<input type="hidden" name="id_venda" value="'.$lr['id_venda'].'"/>
	<input class="btn btn-success" type="submit" value="Visualizar"/></form></td></tr>';}
	echo '</table></hr>';

}
	
?>

		
</div><div class="container"></br><hr/>
<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
			
		</div></div>
</body>