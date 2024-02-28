<?php

require_once("../database.php");
$dt_inicio = $_POST['dt_inicio'];
$dt_final = $_POST['dt_final'];

$sql = "SELECT * FROM vendas WHERE data BETWEEN '%".$dt_inicio."%' and '%".$dt_final."%'";
$consulta = $conexao->query($sql);
echo '

<table  border="1" align="left">
<tr>
    <th scope="col">ID da venda</th>
    <th scope="col">nome do usuario</th>
    <th scope="col">nome do cliente</th>
    <th scope="col">data da venda</th>
	<th scope="col">Ações</th>
</tr>';
while($lr = $consulta->fetch(PDO::FETCH_ASSOC)){
	$id_venda = $lr['id_venda'] ;
	$id_cliente = $lr['id_cliente'];
	echo '<tr><td align="center">'.$id_venda.'</td><td  align="center">'.$lr['nome_us'].'</td>
	<td  align="center">'.$lr['nome_cl'].'</td><td  align="center">'.$lr['data'].'</td>
	<input type="hidden" name="id_venda" value="'.$id_venda.'"/>
	<input type="hidden" name="id_cliente" value="'.$id_cliente.'"/>
	<td><input class="btn btn-success" type="submit" value="Visualizar"/></td></tr>';}
	echo '</table></hr>';
//header("Content-Type: text/html; charset=ISO-8859-1",true);


?>