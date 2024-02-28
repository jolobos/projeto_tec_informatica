<?php

$nivel=0;
error_reporting(E_ALL); //prod: E_INFO
ini_set('display_errors','on'); //prod off
date_default_timezone_set('America/Sao_Paulo');
require_once('verifica_session.php');
session_destroy();
header('location:login.php ');
?>