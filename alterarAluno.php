<?php
include_once ("./classe/categorias.class.php");

$codigoAluno = $_POST["codigoAluno"];
$nomeAluno = $_POST["nomeAluno"];
$nomeAtividade = $_POST["nomeAtividade"];
$valorMensalidade =$_POST["valorMensalidade"];

if (($codigoAluno != "") && ($nomeAluno != "")) {	
	$categorias = new Alunos($codigoAluno, $nomeAluno, $nomeAtividade, $valorMensalidade);
	$categorias->alterarCategoria($codigoAluno, $nomeAluno, $nomeAtividade, $valorMensalidade);
	header('Location: index.php?pag=categoria' );
	$mensagem = "Aluno alterado com sucesso !";
} else {
	$mensagem = "Para alterar o aluno clique no botão alterar !";
	header ( 'Location: index.php?pag=categoria' );
}

if (isset ( $mensagem )) {
	header ( 'Location: index.php?pag=categoria');
	echo "<fieldset>";
	echo "<legend>" . $mensagem . "</legend>";
	echo "</fieldset>";
}
?>