
<?php

require_once('../relatorios/vendor/autoload.php');
require_once('../verifica_session.php');
require_once('../database.php');
error_reporting(E_ALL);
ini_set('display_errors','on');
date_default_timezone_set('America/Sao_Paulo');

$nivel=0;


if(!empty($_POST)){
	$id_venda = $_POST['id_venda'];
	
	$sql = "SELECT * FROM vendas WHERE id_venda = ?";
		$consulta = $conexao->prepare($sql);
        $consulta->execute(array($id_venda));
		$dados_v= $consulta->fetch(PDO::FETCH_ASSOC);
		$data = $dados_v['data'];
		$id_cliente = $dados_v['id_cliente'];
		$id_usuario = $dados_v['id_usuario'];
		
		$sqlv = "SELECT * FROM itens_venda WHERE id_venda = ?";
		$consultav = $conexao->prepare($sqlv);
        $consultav->execute(array($id_venda));
		
		
		
		$sql1 = "SELECT * FROM clientes WHERE id_clientes = ?";
		$consulta1 = $conexao->prepare($sql1);
        $consulta1->execute(array($id_cliente));
		$dados_cl= $consulta1->fetch(PDO::FETCH_ASSOC);
		$cliente = $dados_cl['nome'];
		$CPF = $dados_cl['CPF'];
		
		$sql2 = "SELECT * FROM usuarios WHERE id_user = ?";
		$consulta2 = $conexao->prepare($sql2);
        $consulta2->execute(array($id_usuario));
		$dados_us= $consulta2->fetch(PDO::FETCH_ASSOC);
		$user = $dados_us['usuario'];
		
		
		
			
$doc = new FPDF("p", "mm", "A4");

$doc-> SetTitle("Comprovante");
$doc-> SetSubject("Vendas");
$doc->SetY("-1");
$doc->SetFont('arial','bi',20);


$cont="Criado por Josias Santos";
$texto=date_format(new DateTime($data), "d/m/Y H:i:s");
$doc-> Cell(0,12,"Comprovante de Venda",0,1,"C");
$doc-> Cell(0,10,"data: ".date_format(new DateTime($data), "d/m/Y H:i:s")."",0,1,"L");
$doc-> Cell(0,10,"Vendedor: ".utf8_decode($user)."",0,1,"L");
$doc-> Cell(0,10,'Cliente: '.utf8_decode($cliente).' CPF: '.$CPF,0,1,"L");

$doc->Cell(0,0,'',1,1,'L');
$doc-> Cell(0,10,"Produtos Vendidos ",0,1,"C");

$doc->Cell(0,0,"",0,1,"L");
$doc->Cell(0,7,"",0,1,"L");


$doc-> SetFont('Arial','',12);

$doc->ln();
$doc->Cell(40,7,'cod. prd.');
$doc->SetX(40);
$doc->Cell(40,7,'produto');
$doc->SetX(75);
$doc->Cell(40,7,'quantidade');
$doc->SetX(115);
$doc->Cell(40,7,'valor un.');
$doc->SetX(145);
$doc->Cell(40,7,'');
$doc->SetX(165);
$doc->Cell(40,7,'');
$doc->SetX(160);
$doc->Cell(40,7,'valor somado');
$doc->SetX("0");
$doc->ln();

$doc->Cell(0,0,'',1,1,'L');
$doc->ln();
$doc->ln();
$doc->ln();	


$total=0;
 
while($dados_it= $consultav->fetch(PDO::FETCH_ASSOC)){
	
		$id_produto = $dados_it['id_produto'];
		$quantidade = $dados_it['quantidade'];
		
	
	$sql3 = "SELECT * FROM produtos WHERE id_produto = ?";
  $consulta3 = $conexao->prepare($sql3);
  $consulta3->execute(array($id_produto));
   $d_pr=$consulta3->fetch(PDO::FETCH_ASSOC);
	
 $vl_prod = $d_pr['valor'];
  $descricao = $d_pr['descricao'];
  
  $v_somado = $vl_prod * $quantidade;
  $total += $v_somado;
  
 
  
  
	$doc->ln();	
   	$doc->Cell(40, 10, $d_pr['cod_prod']); 
    $doc->SetX(40);
    $doc->Cell(40, 10,utf8_decode($d_pr['produto'])); 
    $doc->SetX(75);
    $doc->Cell(40, 10,$quantidade);  
    $doc->SetX(115);
    $doc->Cell(40, 10, $d_pr['valor']);   
    $doc->SetX(145);
    $doc->Cell(40, 10, '');  
    $doc->SetX(165);
    $doc->Cell(40, 10, $v_somado);  
    $doc->SetX(160);
}
$doc->SetY("21");
$doc->SetX("30");
$doc->SetY("250");
$doc->Cell(0,0,'',1,1,'L');
$doc->Cell(0,10,'Total:',0,0,'L');
$doc->Cell(0,10,'$ '.$total,0,1,'R');
$doc->SetY("270");
$doc->SetFont('arial','',12);
$doc->Cell(0,0,'',1,1,'L');
$doc->Cell(0,5,$cont,0,0,'L');
$doc->Cell(0,5,$texto,0,1,'R');
$doc->Output("".utf8_decode($cliente)." ".date_format(new DateTime($data), "d/m/Y H:i:s").".pdf","I");

}

	

?>