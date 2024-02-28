<?php
$nivel=1;
require_once('../verifica_session.php');
if(!empty($_POST) ){
$cod_prod = $_POST['cod_prod'];
$produto = $_POST['produto'];
$quantidade = $_POST['quantidade'];
$valor = $_POST['valor'];
$descricao = $_POST['descricao'];
require_once ('../database.php');
		$sql ='INSERT INTO produtos(cod_prod,produto,valor,descricao) values(?,?,?,?)';
		try {
		$insercao = $conexao->prepare($sql);
		$ok = $insercao->execute(array ($cod_prod,$produto,$valor,$descricao));
		}catch(PDOException $r){
			//$msg= 'Problemas com o SGBD.'.$r->getMessage();
			$ok = False;
		}catch (Exception $r){//todos as exceções
		$ok= False; 
			
		}
			if ($ok){
				$msg= '<p class="alert alert-success" > Produtos inseridos com sucesso.  </p>';
				}else{
					$msg='<p class="alert alert-danger" > Produtos  não inseridos. Erro.'.$r->getMessage().'</p>';
			}
			header('location:listagem_p.php?mensagem='.$msg);//redireciona para local especificado
	
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Inserir Produto</title>
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
			<h1 class="text-info"> Insere Produtos</h1>	
			
            
            <div align="left" class="form-group">
            <a class="btn btn-danger" href="../tela_principal.php">Tela Principal</a> </br></br>

<a href="../sair.php" class="btn btn-danger">Sair</a>
</div>            
            
            
			<form class="form-horizontal" action= "insere.php" method="post">
				<fieldset>
					<legend class="alert_primary">Cadastro de Produtos</legend>
					<div class="form-group">
						<label class="col-md-4 control-label" >Codigo do produto: </label>
						<div class="col-md-4">
						<input type = "text" name="cod_prod" class="form-control input-md"/>
						</div>
                        </div>
					
					<div class="form-group">
						<label class="col-md-4 control-label">Produtos: </label>
						<div class="col-md-4">
							<input type = "text" name="produto" class="form-control input-md"/>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label">Valor: </label>
						<div class="col-md-4">
							<input type = "text" name="valor" class="form-control input-md"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" >Descricao: </label>
						<div class="col-md-4">
							<input type = "text" name="descricao" class="form-control input-md"/>
						</div>
					</div>
					<div class="form-group text-center">
						<div class="col-md-8">
							<button type=submit class=" btn btn-primary">Gravar </button>
                            <a class="btn btn-success" href="listagem_p.php">voltar</a>
                             
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
