<?php
session_start();

require_once('../verifica_session.php');
error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');
$nivel=0;
if(!empty($_SESSION['list_prod'])){
	unset($_SESSION['list_prod']);
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
<script type="text/javascript" src="func_cl.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>


<div class="container" 	>
<h1 class="text-info">Selecione um cliente!</h1>
</br>
<a class="btn btn-danger" href="../tela_principal.php">Tela Principal</a>
</br>
</br>
<a class="btn btn-danger" href="../sair.php">Sair</a>
</br>
</br>
<p>Buscar: 
<input type="text" id="busca"  onKeyUp="buscarprodutos(this.value)" /></p>
</br>
<a class="btn btn-primary" href="add_cl.php">adicionar cliente</a>
</br>
<h2>Clientes</h2>		
<div  id="resultado">
<?php
   require_once('../database.php');
  $sql = "SELECT * FROM clientes ";
  $consulta = $conexao->query($sql);

echo '


<table width="1000" border="1" >
<tr>
    <th scope="col">Nome</th>
    <th scope="col">CPF</th>
    <th scope="col">Telefone</th>
     <th scope="col">E-mail</th>
	 <th scope="col">Endereço</th>
	 <th scope="col">Ações</th>
  </tr>';
  while($lr = $consulta->fetch(PDO::FETCH_ASSOC)){
	echo '<tr><td>Nome: '.$lr['nome'].'</td><td> CPF: '.$lr['CPF'].'</td><td> Telefone: '.$lr['telefone'].' </td><td>E-mail: '.$lr['email'].'</td><td>Endereço: '.$lr['endereco'].'</td><td><a class="btn btn-success" href="esc_cl.php?act_cl=add_cl&id_clientes='.$lr['id_clientes'].'">Selecionar</a></td></tr>';}
	echo '</table></hr></div>

	
	';
		
if(!empty($_GET)){
	$id1=$_GET['id_clientes'];

//unset($_SESSION['list_cl']);
if(!isset($_SESSION['list_cl'][$id1])){
	$_SESSION['list_cl']=array();
if(!isset($_SESSION['list_cl'][$id1])){
	
    $_SESSION['list_cl'][$id1]=$id1;
		  }
	
	}

	?>

<form action="venda_usuario.php" method="post">
<?php
foreach($_SESSION['list_cl'] as $i){
		$sql1 = "SELECT * FROM clientes WHERE id_clientes = ?";
		$consulta = $conexao->prepare($sql1);
        $consulta->execute(array($i));
		$dados_cl= $consulta->fetch(PDO::FETCH_ASSOC);
		
		$nome = $dados_cl['nome'];
		$CPF = $dados_cl['CPF'];}

		echo '<h3 class="text-primary">Cliente Selecionado: </h3>';
		echo '<h3>Nome: '.$nome.'</h3>';
		echo '<h3>CPF: '.$CPF.'</h3>';
	echo '</br>
 <input class="btn btn-info" type="submit" value="Continuar"/>   
 </form>';	
}
 ?>

 
 <hr/>
		<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
	
		</div>
 
 </div>




</body>
</html>