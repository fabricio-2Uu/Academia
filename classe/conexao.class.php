<?php

class Conexao {
		
	function __construct(){
	    
		$pdo = new PDO('mysql:host=localhost;port:3308;dbname=base_pedidos', 'root', '');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		
	}

}
?>