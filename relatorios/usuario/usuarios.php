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

<h1 class="text-info">Relatórios</h1>

<a href="../../tela_principal.php" class="btn btn-danger">Tela principal</a>
<a href="../../sair.php" class="btn btn-danger">Sair</a>
<a href="../index.php" class="btn btn-danger">voltar</a>
<a href="top10mes.php" class="btn btn-warning">Ranking mensal</a>
<a href="top10ano.php" class="btn btn-warning">Ranking anual</a>
<a href="top10dia.php" class="btn btn-warning">Ranking diario</a>

</br>
</br>

<h3 class="text-primary"> Selecione um usuário:</h3>
<p>Buscar: 
<input type="text" id="busca"  onKeyUp="buscar_cliente(this.value)" /></p>
</br>
<div id="resultado">

<?php
$sql1 = "SELECT * FROM usuarios ";
		$consulta = $conexao->query($sql1);
		
		echo '
<table  border="1">
<tr>
    
    <th scope="col">nome do usuario </th>
    <th scope="col">nivel</th>
    
	<th scope="col">Ações</th>
</tr>';
		
	while($d = $consulta->fetch(PDO::FETCH_ASSOC)){  echo '<tr><td>'.$d['usuario'].'</td><td>'.$d['nivel'].'</td><td>
	<form action="p_usuario.php" method="post">
	  <input type="hidden" name="id_usuarios" class="btn btn-success" value="'.$d['id_user'].'"/>
	  <input type="submit" class="btn btn-success" value="Pesquisar"/></form></td></tr>';
	}
  
  echo '</tbody>';
   echo '</table>';
  

		
?></div>
</div><div class="container"><hr/>
<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
		</div></div>

</body>