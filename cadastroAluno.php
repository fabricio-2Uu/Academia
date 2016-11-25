<?php
include_once ("./classe/categorias.class.php");
?>
<html>
<head>
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/style.css">
<title>Cadastro Categoria</title>
</head>
<body>

<form name="form1" method="POST" action="index.php?pag=categoria">

<fieldset>
<legend>Cadastro Aluno</legend>

	<table class=tableForm border=0>
		<tr>
			<th colspan=2>Cadastrar Aluno</th>
		</tr>
		<tr>
			<td>Aluno</td>
			<td><input required=required class=inputText type=text name=nomeAluno value=""></td>
		</tr>
		<tr>
			<td>Descrição da Atividade Física</td>
			<td><textarea required=required class=inputText name=nomeAtividade></textarea>
		</tr>
		<tr>
			<td>Valor da Mensalidade</td>
			<td><input required=required type="number" min="0" step='0.01'  class=inputText name=valorMensalidade></td>
		</tr>
		<tr>
			<td colspan='2'>
			<div class=alinhamento_botao>
				<input class='botao' type='submit' value='Salvar'>			
				<input class='botao' type='button' value='Voltar' onClick='history.go(-1)'>
			</div>
			</td>
		</tr>
	</table>

</fieldset>
			
<fieldset>
<legend>Lista Alunos</legend>
<?php
$codigoAluno = 0;
$nomeAluno = "";
$nomeAtividade = "";
$valorMensalidade = 0;
$lista = new Alunos($codigoAluno, $nomeAluno, $nomeAtividade, $valorMensalidade);
$lista->listarCategoria();
?>
</fieldset>			
			
<?php
/***Insere nova categoria**/
if (isset($_GET["pag"])){	
	if (isset($_POST["nomeAluno"]) && isset($_POST["nomeAtividade"])){
		echo $codigoAluno = 0;
		echo $nomeAluno = $_POST["nomeAluno"];
		echo $nomeAtividade = $_POST["nomeAtividade"];
		echo $valorMensalidade = $_POST["valorMensalidade"];
		$categorias = new Alunos($codigoAluno, $nomeAluno, $nomeAtividade, $valorMensalidade);
		$categorias->cadastrarCategoria();
	}
}
?>

</form>

</body>
<html>
