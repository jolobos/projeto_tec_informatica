<?php
session_start();

require_once('../verifica_session.php');
require_once('../database.php');
error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');
$nivel=0;

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Vendas</title>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
</head>

<body>
<div class="container">
<h1 class="text-info">Vendas</h1>

<br />
 <div  class="form-group">
            <a class="btn btn-danger" href="../tela_principal.php">Tela Principal</a> 
</br></br>
<a href="../sair.php" class="btn btn-danger">Sair</a>
</br></br>
  <a  class="btn btn-danger" href="venda_usuario.php" >comprar mais...</a></div>  


<h3 align="center" class="alert alert-success">Tem certeza que deseja comprar esses itens?</h3>




<table align="center" width="600" border="1" >

<tr>
<td align="center" colspan="5" class="alert-success" > Produtos Selecionados</td>
</tr>



  <tr>
    <th width="100" scope="col">cod. prod</th>
    <th scope="col">produto</th>
    <th scope="col">quant</th>
    <th scope="col">valor</th>
     <th width="100" scope="col">vlr somado</th>
      
  </tr>
  <?php
  $total=0;
  if(count($_SESSION['list_prod'])==0){
	  echo '<tr><td align="center" class="alert-danger" colspan="6">Selecione algum produto por favor!!!</td></tr>';
	  }else{
	  foreach($_SESSION['list_prod'] as $id => $qtd){
		  
		  
		  
		$sql = "SELECT * FROM produtos WHERE id_produto= ?";
		$consulta = $conexao->prepare($sql);
        $consulta->execute(array($id));
        $ln =$consulta->fetch(PDO::FETCH_ASSOC);
		
		$cod_prod = $ln['cod_prod'];
		$produto = $ln['produto'] ;
		$valor = $ln['valor'];
		$v_somado = $ln['valor'] * $qtd;
		$total += $v_somado;
		
		echo' <tr>
    <td>'.$cod_prod.'</td>
    <td>'.$produto.'</td>
    <td>'.$qtd.'</td>
    <td>'.$valor.'</td>
    <td>'.$v_somado.'</td>
  </tr>';
	  }
	  
	  }
	  
  
  
 
  echo'<tr><td align="right" colspan="5">Total R$: '.$total.'</td></tr>';



  ?>
  </table>

</br>

<?php
echo '<div align="center"><form  action="pos_venda.php" method="post">

<input type="hidden" name="total" value="'.$total.'"/>
<input class="btn btn-success" type="submit" value="Concluir Venda"/>
</form></div>';?>
<hr/>
		<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
			
		</div></div>


</body>