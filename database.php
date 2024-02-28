<?php

try{
	$conexao = new PDO('mysql:host=localhost; dbname=projeto2;', 'root','');
//host => endereço ip do servidor de banco de dados (ou localhost)
//dbname=> banco de dados que se que acessar
}catch(PDOException $e){
	$erro = $e ->getMessage();
	}
	?>