<?php

class Conexao {
		
	function __construct(){
	    $port = '3308';
		$pdo = new PDO('mysql:host=localhost;port:'.$port.';dbname=base_pedidos', 'root', '');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		
	}

}
?>