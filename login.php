<?php
session_start();


error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');

require_once('database.php');
if(empty($_POST)){
	$msg = 'campos do formulario estao vazios!';
	} else{
		
		if($_POST['usuario']!='' and $_POST['senha']!='' and isset($_POST['usuario']) and isset($_POST['senha'])){
			$usuario = $_POST['usuario'];
			
			
			
			$sql = 'SELECT * FROM usuarios WHERE usuario=?';
			$consulta = $conexao->prepare($sql);
			$consulta->execute(array($usuario));
			$dado = $consulta->fetch(PDO::FETCH_ASSOC);
			$res = $consulta->rowCount();
			$senha = md5($_POST['senha']);
			
			if($res==1){
				if($senha==$dado['senha']){
				$msg= 'Bem vindo!';
				$_SESSION['usuario'] = $dado['usuario'];
				$_SESSION['id_usuario'] = $dado['id_user'];
				$_SESSION['vida'] = 1000								; //segundos
				$_SESSION['decorrido'] = time();
				$_SESSION['nivel'] = $dado['nivel'];

				header('location:tela_principal.php?mens='.$msg);
				}else{
					$msg='Nome de usuario ou senha invalidos.';
				header('location:login.php?mens='.$msg);

					}
			}else{
				$msg= 'Nome de usuario ou senha invalidos.';
			header('location:login.php?mens='.$msg);
			
			}
		
		
		}
	}



/*
dados persistentes(autenticação)
cookies= sao criados no servidor e enviados para o navegador. são arquivos 
que contem dados sobre o usuario(criptografados ou nao).

sessoes(session)= sao criados e armazenados no servidor. sao arquivos que contem dados( criptografados ou nao) dos usuarios.


*/
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login!</title>
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
</br>
</br>
</br>
</br>
<div class="container">
			<div>
            <table align="center" width="400"class=" alert-success"><tr><td>
				<h1 align="center" class="text-info">
					Login
				</h1>
			


<?php
if(!empty($msg)){
	echo '<p align="center" class=" alert-danger">'.$msg.'</p>';
}
?>
<div align="center">
<form action="login.php" method="post">
<table><tr><td><p>Nome:</p></td><td> <input class="form-group" type="text" name="usuario"/></td></tr>
<tr><td><p>Senha:</p></td><td><input class="form-group" type="password" name="senha"/></td></tr> 
</div>
</table>
<div align="center"><input  class="btn btn-warning" type="submit" value="Entrar"/>

</form>
</div>
			
	</td></tr></table>
</div>
<hr/>
		<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
			</p>
		</div>
		</div>
</body>
</html>
