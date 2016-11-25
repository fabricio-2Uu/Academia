<html>
<head>
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/style.css">
<title>Exemplo PHP</title>
</head>
<body>

<div id='cssmenu'>
	<ul>
    <li class='active has-sub'><a href='#'><span>CADASTRO</span></a>
		<ul>
			<li class='has-sub'><a href='#'><span>Aluno</span></a>
				<ul>
					<li><a href='index.php?pag=categoria'><span>Cadastrar novo aluno</span></a></li>
					<li><a href='index.php?pag=categoria_op'><span>Listar alunos</span></a></li>
				</ul>
			</li>
		</ul>
	</li>   
</div>

<?php 

if (isset($_GET["pag"])){

	/****************/
	/* CATEGORIA    */
	/****************/
	
	if ($_GET["pag"] == "categoria") {
		include ("cadastroAluno.php");
	} else {
	}
	
	if ($_GET ["pag"] == "categoria_op") {
		include ("listarAluno.php");
	} else {
	}
	
	if ($_GET ["pag"] == "categoria_con") {
		include ("consultaAluno.php");
	} else {
	}
	
	if ($_GET ["pag"] == "categoria_alt") {
		include ("alterarAluno.php");
	} else {
	}
	
	if ($_GET ["pag"] == "categoria_exc") {
		include ("excluirAluno.php");
	} else {
	}

}
?>

</body>
<html>