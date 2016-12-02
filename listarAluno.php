<?php
include_once("./classe/categorias.class.php");
?>

<fieldset>
<legend>Lista de Alunos</legend>
<?PHP
$codigoAluno = 0;
$nomeAluno = "";
$nomeAtividade = "";
$valorMensalidade = 0;
$dataVencimento = null;
$categorias = new Alunos($codigoAluno, $nomeAluno, $nomeAtividade, $valorMensalidade, $dataVencimento);
$categorias->listarCategoria();
?>
</fieldset>