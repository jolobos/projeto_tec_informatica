<!DOCTYPE html>
<html>
<head>
<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insere cliente</title>
</head>

<body>
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
			header('location:esc_cl.php');//redireciona para local especificado
	
		}
?>


<div class="container">
			<h1 class="text-info"> Inserir Clientes</h1>	
			
			<form class="form-horizontal" action= "add_cl.php" method="post">
				<fieldset>
					<legend class="text-info">Cadastro de Clientes</legend>
			
					<div class="form-group">
						<label class="col-md-4 control-label">Nome: </label>
						<div class="col-md-4">
							<input type = "text" name="nome" class="form-control input-md"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">CPF: </label>
						<div class="col-md-4">
							<input type = "text" name="CPF" class="form-control input-md"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Telefone: </label>
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
						<label class="col-md-4 control-label">Endereco: </label>
						<div class="col-md-4">
							<input type = "text" name="endereco" class="form-control input-md"/>
						</div>
					</div>
					<div class="form-group text-center">
						<div class="col-md-8">
							<button type=submit class="btn btn-primary">Gravar </button> 
                            <a class="btn btn-success" href="esc_cl.php">voltar</a>
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