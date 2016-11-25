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
	$categoria = new Alunos($codigoAluno, $nomeAluno, $nomeAtividade, $valorMensalidade);
	$categoria->consultarCategoria($codigoAluno);
}
?>
</fieldset>