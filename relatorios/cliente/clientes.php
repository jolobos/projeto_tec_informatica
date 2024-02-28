<?php
require_once('../../verifica_session.php');
require_once('../../database.php');
error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');
$nivel=1;

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Relatórios de Clientes</title>

<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/style.css" rel="stylesheet">
	<script type="text/javascript" src="func_cl.js"></script>

</head>
<body>

<div class="container">

<h1 class="text-info">Relatório de Compra dos Clientes</h1>

<a href="../../tela_principal.php" class="btn btn-danger">Tela principal</a>
<a href="../../sair.php" class="btn btn-danger">Sair</a>
<a href="../index.php" class="btn btn-danger">voltar</a>

<a href="top10mes.php" class="btn btn-warning">Ranking mensal</a>
<a href="top10ano.php" class="btn btn-warning">Ranking anual</a>
<a href="top10dia.php" class="btn btn-warning">Ranking diario</a>
<a href="ac_ano.php" class="btn btn-primary">acumulado por ano</a>
<a href="ac_mes.php" class="btn btn-primary">acumulado por mes</a></br></br>
<a href="ac_dia.php" class="btn btn-primary">acumulado por dia</a>

</br>
</br>

<h3 class="text-primary"> Selecione um cliente:</h3>
<p>Buscar: 
<input type="text" id="busca"  onKeyUp="buscar_cliente(this.value)" /></p>
</br>
<div id="resultado">





<?php
$sql1 = "SELECT * FROM clientes ";
		$consulta = $conexao->query($sql1);
		
		
		
		  echo '<table class = "table-striped" border="1">';
  echo '<thead>';
  echo '<tr>';
  
  echo '<th>Clientes</th><th>CPF</th><th>Açoes</th>';
  
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  
while($dados = $consulta->fetch(PDO::FETCH_ASSOC)){
	  
	   echo '<tr><td>'.$dados['nome'].'</td><td>'.$dados['CPF'].'</td><td>	
      <form action="p_clientes.php" method="post">
	  <input type="hidden" name="id_clientes" value="'.$dados['id_clientes'].'"/>
	  <input type="submit" class="btn btn-success" value="Pesquisar"/></form></td></tr>';
  }
  
  echo '</tbody>';
   echo '</table>' ;
  echo $dados['id_clientes'];


?>
</div>
</div><div class="container"><hr/>
<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
			
		</div></div>
</body>