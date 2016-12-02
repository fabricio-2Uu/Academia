<?php
error_reporting(0);
include_once ("./classe/categorias.class.php");

$codigoAluno = $_GET["codigoAluno"];

if ($codigoAluno != "") {
	$nomeAluno = "";
	$nomeAtividade = "";
	$dataVencimento = null;
	$categoria = new Alunos($codigoAluno, $nomeAluno, $nomeAtividade, $dataVencimento);
	$categoria->excluiCategoria($codigoAluno);
	$mensagem = "Aluno excluido com sucesso !";
} else {
	$mensagem = "Para excluir um aluno clique no botão excluir !";
}

if (isset($mensagem)){
	header('Location: ./index.php?pag=categoria_op');
	echo "<fieldset>";
	echo "<legend>".$mensagem."</legend>";
	echo "</fieldset>";
}

?>