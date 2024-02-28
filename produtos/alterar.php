	<?php
$nivel=1;
require_once('../verifica_session.php');
	error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');

require_once ('../database.php');

$id = $_GET['id_produto'];
$sql= 'SELECT * FROM produtos WHERE id_produto= ?';
$consulta = $conexao->prepare($sql);
$consulta->execute(array($id));
$dado = $consulta->fetch(PDO::FETCH_ASSOC);

if(!empty($_POST) ){
$cod_prod = $_POST['cod_prod'];
$produto = $_POST['produto'];
$valor = $_POST['valor'];
$descricao = $_POST['descricao'];
$id = $_POST['id_produto'];
		$sql ='UPDATE produtos SET cod_prod=?, produto=?,valor=?,descricao=?
		WHERE id_produto=?';
		try {
		$insercao = $conexao->prepare($sql);
		$ok = $insercao->execute(array ($cod_prod,$produto,$valor,$descricao,$id));
		}catch(PDOException $r){
			//$msg= 'Problemas com o SGBD.'.$r->getMessage();
			$ok = False;
		}catch (Exception $r){//todos as exce��es
		$ok= False; 
			
		}
			if ($ok){
				$msg= '<p class="alert alert-success" > produto alterado com sucesso.  </p>';
				}else{
					$msg='<p class="alert alert-danger" > produto  nao alterado. Erro.'.$r->getMessage().'</p>';
			}
			header('location:listagem_p.php?mensagem='.$msg);//redireciona para local especificado
	
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Altera produtos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/scripts.js"></script>
</head>

<body>
			<div class="container">
			<h1 class="text-info"> Altera Produtos</h1>	
		</br>
            
            <div align="left" class="form-group">
            <a class="btn btn-danger" href="../tela_principal.php">Tela Principal</a> </br></br>

<a href="../sair.php" class="btn btn-danger">Sair</a>
</div>            
            
            
            
            
			<form class="form-horizontal" action= "alterar.php" method="post">
				<fieldset>
					<legend class="text-primary">Cadastro de Produtos</legend>
			<div class="form-group">
						<label class="col-md-4 control-label" >Codigo produto: </label>
						<div class="col-md-4">
							<input type = "text" name="cod_prod" value="<?php echo $dado['cod_prod']; ?>" class="form-control input-md"/>
						</div>
					</div>
					           
					<div class="form-group">
						<label class="col-md-4 control-label" >Produto: </label>
						<div class="col-md-4">
							<input type = "text" name="produto" value="<?php echo $dado['produto']; ?>" class="form-control input-md"/>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label">Valor: </label>
						<div class="col-md-4">
							<input type = "text" name="valor" value="<?php echo $dado['valor']; ?>"  class="form-control input-md"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" >Descrição: </label>
						<div class="col-md-4">
							<input type = "text" name="descricao" value="<?php echo $dado['descricao']; ?>"  class="form-control input-md"/>
						</div>
					</div>
					
							<input type = "hidden" name="id_produto" value="<?php echo $dado['id_produto'] ;?>" />
					
					<div class="form-group text-center">
						<div class="col-md-8">
							<button type=submit class="btn btn-primary">Gravar </button> 
						</div>
					</div>		
				</fieldset>
			</form> 
				
		<hr/>
		<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
			
		</div>
	
</div>
</body>
</html>
