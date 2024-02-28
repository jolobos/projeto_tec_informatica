<?php
require_once('../relatorios/vendor/autoload.php');
require_once('../verifica_session.php');
require_once('../database.php');
error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');
$nivel=0;

$data=date("Y/m/d H:i:s");
$data_per = date("Y/m/d");
foreach($_SESSION['list_cl'] as $i){
		$sql1 = "SELECT * FROM clientes WHERE id_clientes = ?";
		$consulta = $conexao->prepare($sql1);
        $consulta->execute(array($i));
		$dados_cl= $consulta->fetch(PDO::FETCH_ASSOC);
		$cliente = $dados_cl['nome'];
		$CPF = $dados_cl['CPF'];
		$id_cl = $dados_cl['id_clientes'];
		}
		
if(!empty($_SESSION['list_prod']) ){
	
$total = $_POST['total'];	
$id_us	= $_SESSION['id_usuario'];
	
		$sql ='INSERT INTO vendas(data,id_cliente,id_usuario,total,data_periodo) values(?,?,?,?,?)';
		try {
		$insercao = $conexao->prepare($sql);
		$ok = $insercao->execute(array ($data,$id_cl,$id_us,$total,$data_per));
		}catch(PDOException $r){
			//$msg= 'Problemas com o SGBD.'.$r->getMessage();
			$ok = False;
		}catch (Exception $r){//todos as exceções
		$ok= False; 
		}
				
		$sql = "SELECT id_venda FROM vendas ORDER BY id_venda DESC LIMIT 1";
		$consulta = $conexao->prepare($sql);
        $consulta->execute(array());
		$lr = $consulta->fetch(PDO::FETCH_ASSOC);
		$id_venda = $lr['id_venda'];


	
foreach($_SESSION['list_prod'] as $id => $qtd){
		  
		$sql ='INSERT INTO itens_venda(id_venda,id_produto,quantidade,data_prod) values(?,?,?,?)';
		try {
		$insercao = $conexao->prepare($sql);
		$ok = $insercao->execute(array ($id_venda,$id,$qtd,$data));
		}catch(PDOException $r){
			//$msg= 'Problemas com o SGBD.'.$r->getMessage();
			$ok = False;
		}catch (Exception $r){//todos as exceções
		$ok= False; 
			
		}
			
}
			}

			
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Vendas</title>
<script type="text/javascript" src="funcs.js"></script>

<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
</head>

<body>

<div class="container"  >
<h1 class="text-info">Venda Concluida!!!</h1>
<br />
<br /><div align="center">
<form action="gera_pdf.php" method="post" target="_blank">

<input type="submit"  class="btn btn-success" value="Gerar Comprovante" />
</br>
</br>
</form>
<a class="btn btn-primary" href="esc_cl.php">Nova Venda</a>
</br>
</br><a class="btn btn-danger" href="../tela_principal.php">Tela Principal</a>
</br>
</br><a class="btn btn-danger" href="../sair.php">Sair</a>
</br>
</br></div>

		<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
			
		</div></div>


</body>			
