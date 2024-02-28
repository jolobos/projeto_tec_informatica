<?php

session_start();

require_once('../verifica_session.php');
require_once('../database.php');
error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');
$nivel=0;


//$_SESSION['list_prod'];






if(!isset($_SESSION['list_prod'])){
	$_SESSION['list_prod'] = array();
	}
	
	if(isset($_GET['acao'])){
		if($_GET['acao']== 'del1'){
		  
		  $id = intval($_GET['id']);
		  if(!isset($_SESSION['list_prod'][$id])){
		  $_SESSION['list_prod'][$id]=1;
		  }else{
			  $_SESSION['list_prod'][$id] -=1;
			  }
			
			}}
	
	if(isset($_GET['acao'])){
		if($_GET['acao']== 'add'){
		  
		  $id = intval($_GET['id']);
		  if(!isset($_SESSION['list_prod'][$id])){
		  $_SESSION['list_prod'][$id]=1;
		  }else{
			  $_SESSION['list_prod'][$id] +=1;
			  }
			
			}
			
				
			
			if($_GET['acao']== 'del'){
		  
		  $id = intval($_GET['id']);
		  if(isset($_SESSION['list_prod'][$id])){
		  unset($_SESSION['list_prod'][$id]);
		  }
			}
			
			if($_GET['acao'] == 'up'){
				if(is_array($_POST['prod'])){
					foreach($_POST['prod'] as $id => $qtd){
						$id = intval($id);
						$qtd = intval($qtd);
						if(!empty($qtd) || $qtd <> 0 ){
						$_SESSION['list_prod'][$id] = $qtd;
							}else{
						unset($_SESSION['list_prod'][$id]);	
								}
							}}}
		
		}




?>




<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Vendas</title>
<script type="text/javascript" src="funcs.js"></script>

<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
</head>

<body>

<div class="container"  >
<h1 class="text-info">Vendas</h1>

<br />
 <div class="form-group">
            <a class="btn btn-danger" href="../tela_principal.php">Tela Principal</a> 
</br>
</br>
<a href="../sair.php" class="btn btn-danger">Sair</a>
</div>
<h2 class="text-success">Cliente:</h2>

<?php
$id1=$_SESSION['list_cl'];
foreach($_SESSION['list_cl'] as $i){
		$sql1 = "SELECT * FROM clientes WHERE id_clientes = ?";
		$consulta = $conexao->prepare($sql1);
        $consulta->execute(array($i));
		$dados_cl= $consulta->fetch(PDO::FETCH_ASSOC);
		$nome = $dados_cl['nome'];
		$CPF = $dados_cl['CPF'];
		echo '<h3>'.$nome.'</h3>';
		
		}

?>

<h1 class="text-primary">Lista de Produtos</h1>
<strong>Buscar produtos:</strong><br />
<input type="text" id="busca"  onKeyUp="buscarprodutos(this.value)" />
</br>
</br>
<div  id="resultado">
            
	<table  width="550" border="1" align="left">
<tr>
    <th scope="col">cod. prod</th>
    <th scope="col">produto</th>
    <th scope="col">valor</th>
     <th scope="col">Acoes</th>
  </tr>	
  
 
  
<?php
$sql = "SELECT * FROM produtos";
		$consulta = $conexao->prepare($sql);
        $consulta->execute(array());


		while($lr = $consulta->fetch(PDO::FETCH_ASSOC)){
	echo '<tr><td>'.$lr['cod_prod'].'</td><td> Nome: '.$lr['produto'].'</td>
	<td> Valor: '.$lr['valor'].' </td><td><a class="btn btn-success" href="venda_usuario.php?acao=add&id='.$lr['id_produto'].'">Adicionar</a></td></tr>';}
	  
		
		?>	
        
    </table>
</div>    
            
          

<form action="?acao=up" method="post">


<p>&nbsp; </p>
<table align="right" width="550" border="1" >

<tr>
<td align="center" colspan="6"><input  class="btn btn-info" type="submit" value="atualizar venda"/></td>
</tr>



  <tr>
    <th width="50" scope="col">cod. prod</th>
    <th scope="col">produto</th>
    <th scope="col">quant</th>
    <th scope="col">valor</th>
     <th scope="col">vlr soma</th>
      <th scope="col">Acoes</th>
  </tr>
  <?php
  $total=0;
  if(count($_SESSION['list_prod'])==0){
	  echo '<tr><td align="center" class="alert-success" colspan="6">nenhum produto selecionado</td></tr>';
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
    <td><input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'"/></td>
    <td>'.$valor.'</td>
    <td>'.$v_somado.'</td>
	<td><a class="btn btn-success"href="venda_usuario.php?acao=add&id='.$ln['id_produto'].'">+1</a><a class="btn btn-warning"href="venda_usuario.php?acao=del1&id='.$ln['id_produto'].'">-1</a><a class="btn btn-danger"href="venda_usuario.php?acao=del&id='.$ln['id_produto'].'">Remover</a></td>
  </tr>';
	  }
	  
	  }
	  
  
  
 
  echo'<tr><td align="right" colspan="6">Total R$: '.$total.'</td></tr>'
  
  ?>
  


  </table>

</br>


</form>
</div>
</br>
<div align="center" class="container">
<form   action="conclui_venda.php" method="post">
<input type="submit" class="btn btn-primary" name="enviar" value="finalizar pedido" />

</form>


</div>


<div class="container">
<hr/>
		<div class= "foot well">
		<P>&copy; 2016 -Josias Santos de Azevedo </P>
			
		</div></div>
</body>
</html>