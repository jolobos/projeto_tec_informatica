<?php
$nivel=1;
require_once('../verifica_session.php');
error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');

try{
	$conexao = new PDO('mysql:host=localhost; dbname=projeto2', 'root','');

}catch(PDOException $e){
	$erro = $e ->getMessage();
	}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Lista de Produtos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/scripts.js"></script>
    	<script type="text/javascript" src="func_pr.js"></script>

</head>

<body>
			<div class="container">
				<h1 class="text-info">
					Lista de Produtos
				</h1>
			

<div align="left" class="form-group">
            <a class="btn btn-danger" href="../tela_principal.php">Tela Principal</a> </br></br>

<a href="../sair.php" class="btn btn-danger">Sair</a>
</div>      <h4>Buscar: <input type="text" id="busca"  onKeyUp="buscarprodutos(this.value)" />
</h4></br>
  <div id="resultado">      



<?php
if(!empty($_GET['mensagem'])){
	echo $_GET['mensagem'];
}
?>


<?php

 if (!empty($erro)){
	 echo '<p> houve um problema no acesso ao banco de dados contate o administrador e diga que ocorreu o erro <b>'.$erro.'</b></p>';
 }
  
  $sql = 'SELECT * FROM produtos';
  $consulta = $conexao->query($sql);
  $dados = $consulta->fetchALL(PDO::FETCH_ASSOC);
  echo '<div class="form-group"><a class="btn btn-warning" href="insere.php">inserir</a></div>';
  
  
  echo '<table class = "table-striped" border="1">';
  echo '<thead>';
  echo '<tr>';
  
  echo '<th>codigo do produto</th><th>Produto</th><th>Valor</th><th>Descriçao</th><th>Açoes</th>';
  
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  
  foreach($dados as $d){
	  echo '<tr><td>'.$d['cod_prod'].'</td><td>'.$d['produto'].'</td><td>$ '.$d['valor'].'</td><td>'.$d['descricao'].
	  '</td><td><a class="btn btn-success" href = "ver.php?id_produto='.$d['id_produto'].'">ver</a><a class="btn btn-primary" href = "alterar.php?id_produto='.$d['id_produto'].'"> alterar</a><a class="btn btn-danger" href = "deletar.php?id_produto='.$d['id_produto'].'"> deletar</a></td></tr>';
  }
  
  echo '</tbody>';
   echo '</table>';
  
  
  ?>
  
  </div>
  <hr/>
		<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
				
		</div>
	
	
	</div>
</body>
</html>
