<?php

require_once("../../database.php");
$valor = $_GET['valor'];
$sql = "SELECT * FROM vendas WHERE data LIKE '%".$valor."%'";
$consulta = $conexao->prepare($sql);
$consulta->execute(array());
$lr1 = $consulta->fetchALL(PDO::FETCH_ASSOC);

header("Content-Type: text/html; charset=ISO-8859-1",true);
if(!empty($lr1)){echo '
<table  border="1" align="left">
<tr>
    
    <th scope="col">nome do cliente </th>
    <th scope="col">data da venda</th>
    <th scope="col">nome do usuario</th>
	<th scope="col">Ações</th>
</tr>';
foreach($lr1 as $lr){
	$id3 = $lr['id_usuario'] ;
	$id2 = $lr['id_cliente'];
	
	$sql2 = "SELECT * FROM clientes WHERE id_clientes = ?";
		$consulta2 = $conexao->prepare($sql2);
        $consulta2->execute(array($id2));
		$dados_cl = $consulta2->fetch(PDO::FETCH_ASSOC);	
		$cliente = $dados_cl['nome'];
		
		$sql4 = "SELECT * FROM usuarios WHERE id_user = ?";
		$consulta4 = $conexao->prepare($sql4);
        $consulta4->execute(array($id3));
		$dados_us = $consulta4->fetch(PDO::FETCH_ASSOC);	
	
	echo '<tr><td align="center">'.$cliente.'</td><td  align="center">'.date_format(new DateTime($lr['data']), "d/m/Y H:i:s").'</td>
	<td  align="center">'.$dados_us['usuario'].'</td><td><form action="../gera_pdf.php" method="post" target="_blank">
	<input type="hidden" name="id_venda" value="'.$lr['id_venda'].'"/>
<input class="btn btn-success" type="submit" value="Visualizar"/></form></td></tr>';

}

echo '</table>';}else{
	
	echo '</br><a class="alert alert-danger">Nenhuma venda efetuada nesse periodo</a>';
	
}


?>