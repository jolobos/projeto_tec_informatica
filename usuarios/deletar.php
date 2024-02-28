<?php
$nivel=1;
require_once('../verifica_session.php');
error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');

require_once('../database.php');
if(!empty($_GET)){
	$id = $_GET['id_user'];
$sql= 'SELECT * FROM usuarios WHERE id_user= ?';
$consulta = $conexao->prepare($sql);
$consulta->execute(array($id));
$dado = $consulta->fetch(PDO::FETCH_ASSOC);
}
if(!empty($_POST) ){
$id = $_POST['id_user'];
		$sql ='DELETE FROM usuarios 
		WHERE id_user=?';
		try {
		$insercao = $conexao->prepare($sql);
		$ok = $insercao->execute(array ($id));
		}catch(PDOException $r){
			$ok = False;
		}catch (Exception $r){
		$ok= False; 
			
		}
			if ($ok){
				$msg= '<p class="alert alert-success" > usuario deletado com sucesso.  </p>';
				}else{
					$msg='<p class="alert alert-danger" > usuario não deletado. Erro.'.$r->getMessage().'</p>';
			}
			header('location:listagem.php?mensagem='.$msg);
		}

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Deleta Usuario</title>
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
				<h1 class="text-info">
					Deletar Usuario
				</h1>
<div align="left" class="form-group">
            <a class="btn btn-danger" href="../tela_principal.php">Tela Principal</a> 
</br></br>
<a href="../sair.php" class="btn btn-danger">Sair</a>
</div>            

<p class="alert alert-danger">Tem certeza? Este registro sera deletado.</p>

<form action="deletar.php" method="post">
<h4 class="text-primary">Usuario:</h4>

<p>Usuario: <?php echo $dado['usuario'];?> </p>
<p>Administrador: <?php echo $dado['nivel'];?> </p>
<p>Senha: <?php echo $dado['senha'];?> </p>
<input type="hidden" name="id_user" value="<?php echo $dado['id_user'];?>"/>
<input type ="submit" value="Deletar" class="btn btn-danger"/>
<a href = "listagem.php" class="btn btn-success">voltar</a>

</form>
<hr/>
		<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
			
		</div>
		</div>
		
</body>
</html>
