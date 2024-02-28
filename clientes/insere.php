<?php
	$nivel=0;
require_once('../verifica_session.php');
if(!empty($_POST) ){
$nome = $_POST['nome'];
$CPF = $_POST['CPF'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
require_once ('../database.php');
		$sql ='INSERT INTO clientes(nome,CPF,telefone,email,endereco) values(?,?,?,?,?)';
		try {
		$insercao = $conexao->prepare($sql);
		$ok = $insercao->execute(array ($nome,$CPF,$telefone,$email,$endereco));
		}catch(PDOException $r){
			//$msg= 'Problemas com o SGBD.'.$r->getMessage();
			$ok = False;
		}catch (Exception $r){//todos as exceções
		$ok= False; 
			
		}
			if ($ok){
				$msg= '<p class="alert alert-success" > cliente inserido com sucesso.  </p>';
				}else{
					$msg='<p class="alert alert-danger" > cliente  não inserido. Erro.'.$r->getMessage().'</p>';
			}
			header('location:listagem.php?mensagem='.$msg);//redireciona para local especificado
	
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Insere Clientes</title>
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
			<h1 class="text-info"> Inserir Clientes</h1>	
			
			<form class="form-horizontal" action= "insere.php" method="post">
				<fieldset>
					<legend class="text-primary">Cadastro de Clientes</legend>
			
					<div class="form-group">
						<label class="col-md-4 control-label"  >Nome: </label>
						<div class="col-md-4">
							<input type = "text" name="nome" class="form-control input-md"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label"  >CPF: </label>
						<div class="col-md-4">
							<input type = "text" name="CPF" class="form-control input-md"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" >Telefone: </label>
						<div class="col-md-4">
							<input type = "text" name="telefone" class="form-control input-md"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">E-mail: </label>
						<div class="col-md-4">
							<input type = "text" name="email" class="form-control input-md"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" >Endereco: </label>
						<div class="col-md-4">
							<input type = "text" name="endereco" class="form-control input-md"/>
						</div>
					</div>
					<div class="form-group text-center">
						<div class="col-md-8">
							<button type=submit class="btn btn-primary">Gravar </button> 
                            <a class="btn btn-success" href="listagem.php">voltar</a>
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
