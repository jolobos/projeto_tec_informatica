	<?php
$nivel=1;
require_once('../verifica_session.php');
	error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');

require_once ('../database.php');

$id = $_GET['id_user'];
$sql= 'SELECT * FROM usuarios WHERE id_user= ?';
$consulta = $conexao->prepare($sql);
$consulta->execute(array($id));
$dado = $consulta->fetch(PDO::FETCH_ASSOC);

if(!empty($_POST) ){
$usuario = $_POST['usuario'];
$admin = $_POST['nivel'];
$senha = md5($_POST['senha']);
$id = $_POST['id_user'];
		$sql ='UPDATE usuarios SET usuario=?,nivel=?,senha=?
		WHERE id_user=?';
		try {
		$insercao = $conexao->prepare($sql);
		$ok = $insercao->execute(array ($usuario,$nivel,$senha,$id));
		}catch(PDOException $r){
			$ok = False;
		}catch (Exception $r){
		$ok= False; 
			
		}
			if ($ok){
				$msg= '<p class="alert alert-success" > usuario alterado com sucesso.  </p>';
				}else{
					$msg='<p class="alert alert-danger" > usuario  nao alterado. Erro.'.$r->getMessage().'</p>';
			}
			header('location:listagem.php?mensagem='.$msg);
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>altera usuario</title>
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
			<h1 class="text-info"> Altera Usuarios</h1>	
		    <div align="left" class="form-group">
            <a class="btn btn-danger" href="../tela_principal.php">Tela Principal</a> 
</br></br>

<a href="../sair.php" class="btn btn-danger">Sair</a>
</div>            
            
			<form class="form-horizontal" action= "alterar.php" method="post">
				<fieldset>
					<legend class="text_primary">Cadastro de Usuarios</legend>
			
					<div class="form-group">
						<label class="col-md-4 control-label">Usuario: </label>
						<div class="col-md-4">
							<input type = "text" name="usuario" value="<?php echo $dado['usuario']; ?>" class="form-control input-md"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Nivel de Usuario: </label>
						<div class="col-md-4">
							<input type = "text" name="nivel" value="<?php echo $dado['nivel']; ?>"  class="form-control input-md"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Senha: </label>
						<div class="col-md-4">
							<input type = "text" name="senha" placeholder="senha"  class="form-control input-md"/>
						</div>
					</div>
						<input type = "hidden" name="id_user" value="<?php echo $dado['id_user'] ;?>" />
					
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
