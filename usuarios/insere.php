<?php
$nivel=1;
require_once('../verifica_session.php');
if(!empty($_POST) ){
$usuario = $_POST['usuario'];
$nivel = $_POST['nivel'];
$senha = md5($_POST['senha']);

require_once ('../database.php');
		$sql ='INSERT INTO usuarios(usuario,nivel,senha) values(?,?,?)';
		try {
		$insercao = $conexao->prepare($sql);
		$ok = $insercao->execute(array ($usuario,$nivel,$senha));
		}catch(PDOException $r){
			//$msg= 'Problemas com o SGBD.'.$r->getMessage();
			$ok = False;
		}catch (Exception $r){//todos as exceções
		$ok= False; 
			
		}
			if ($ok){
				$msg= '<p class="alert alert-success" > usuario inserido com sucesso.  </p>';
				}else{
					$msg='<p class="alert alert-danger" > usuario  não inserido. Erro.'.$r->getMessage().'</p>';
			}
			header('location:listagem.php?mensagem='.$msg);//redireciona para local especificado
	
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Grud!</title>
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
			<h1 class="text-info"> Insere Usuario</h1>	
            <div align="left" class="form-group">
            <a class="btn btn-danger" href="../tela_principal.php">Tela Principal</a> 
</br></br>
<a href="../sair.php" class="btn btn-danger">Sair</a>
</div>            
            
			<form class="form-horizontal" action= "insere.php" method="post">
				<fieldset>
					<legend class="text-primary" >Cadastro de Usuario</legend>
			
					<div class="form-group">
						<label class="col-md-4 control-label">Usuario: </label>
						<div class="col-md-4">
							<input type = "text" name="usuario" class="form-control input-md"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Nivel: </label>
						<div class="col-md-4">
							<input type = "text" name="nivel" class="form-control input-md"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Senha: </label>
						<div class="col-md-4">
							<input type = "text" name="senha" class="form-control input-md"/>
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
