	<?php
	$nivel=0;
require_once('../verifica_session.php');
	error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');

require_once ('../database.php');

$id = $_GET['id_clientes'];
$sql= 'SELECT * FROM clientes WHERE id_clientes= ?';
$consulta = $conexao->prepare($sql);
$consulta->execute(array($id));
$dado = $consulta->fetch(PDO::FETCH_ASSOC);

if(!empty($_POST) ){
$nome = $_POST['nome'];
$CPF = $_POST['CPF'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$id = $_POST['id_clientes'];
		$sql ='UPDATE clientes SET nome=?,CPF=?,telefone=?,email=?,endereco=?
		WHERE id_clientes=?';
		try {
		$insercao = $conexao->prepare($sql);
		$ok = $insercao->execute(array ($nome,$CPF,$telefone,$email,$endereco,$id));
		}catch(PDOException $r){
			//$msg= 'Problemas com o SGBD.'.$r->getMessage();
			$ok = False;
		}catch (Exception $r){//todos as exce��es
		$ok= False; 
			
		}
			if ($ok){
				$msg= '<p class="alert alert-success" > clientes alterados com sucesso.  </p>';
				}else{
					$msg='<p class="alert alert-danger" > clientes  n�o alterados. Erro.'.$r->getMessage().'</p>';
			}
			header('location:listagem.php?mensagem='.$msg);//redireciona para local especificado
	
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Altera cliente</title>
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
			<h1 class=" text-info"> Alterar Clientes</h1>	
			<div align="left" class="form-group">
  <a class="btn btn-danger" href="../tela_principal.php" >Tela principal</a></br></br>

<a href="../sair.php" class="btn btn-danger">Sair</a>
</div>            
			<form class="form-horizontal" action= "alterar.php" method="post">
				<fieldset>
					<legend class="text-primary">Cadastro de Clientes</legend>
			
					<div class="form-group">
						<label class="col-md-4 control-label"  >Nome: </label>
						<div class="col-md-4">
							<input type = "text" name="nome" value="<?php echo $dado['nome']; ?>" class="form-control input-md"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" >CPF: </label>
						<div class="col-md-4">
							<input type = "text" name="CPF" value="<?php echo $dado['CPF']; ?>"  class="form-control input-md"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Telefone: </label>
						<div class="col-md-4">
							<input type = "text" name="telefone" value="<?php echo $dado['telefone']; ?>"  class="form-control input-md"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label"  >E-mail: </label>
						<div class="col-md-4">
							<input type = "text" name="email" value="<?php echo $dado['email']; ?>"  class="form-control input-md"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label"  >Endereco: </label>
						<div class="col-md-4">
							<input type = "text" name="endereco" value="<?php echo $dado['endereco']; ?>"  class="form-control input-md"/>
						</div>
					</div>
					
							<input type = "hidden" name="id_clientes" value="<?php echo $dado['id_clientes'] ;?>" />
					
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
