<?php
include_once ("./classe/categorias.class.php");
?>

<fieldset>
	<legend>Consulta Categoria</legend>
<?php
$codigoAluno = $_GET["codigoAluno"];
if ($codigoAluno != "") {
	
	$nomeAluno = "";
	$nomeAtividade = "";
	$valorMensalidade = 0;
	$dataVencimento = null;
	$categoria = new Alunos($codigoAluno, $nomeAluno, $nomeAtividade, $valorMensalidade, $dataVencimento);
	$categoria->consultarCategoria($codigoAluno);
}
?>
</fieldset>