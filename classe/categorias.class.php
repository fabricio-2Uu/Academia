<?php

class Alunos {
	
	private $codigoAluno;
	private $nomeAluno;
	private $nomeAtividade;
	private $valorMensalidade;
	private $port = '3306';
	
	
	// Construtor================================================================================================================================
	public function __construct($codigoAluno, $nomeAluno, $nomeAtividade, $valorMensalidade) {
		$this->codigoAluno = $codigoAluno;
		$this->nomeAluno = $nomeAluno;
		$this->nomeAtividade = $nomeAtividade;
		$this->valorMensalidade = $valorMensalidade;
	}
	
	// ==========================================================================================================================================
	public function setcodigoAluno($codigoAluno) {
		$this->setcodigoAluno = $codigoAluno;
	}
	public function getcodigoAluno() {
		return $this->codigoAluno;
	}
	
	// ==========================================================================================================================================
	public function setnomeAluno($nomeAluno) {
		$this->setnomeAluno = $nomeAluno;
	}
	public function getnomeAluno() {
		return $this->nomeAluno;
	}
	
	// ==========================================================================================================================================
	public function setnomeAtividade($nomeAtividade) {
		$this->setnomeAtividade = $nomeAtividade;
	}
	public function getnomeAtividade() {
		return $this->nomeAtividade;
	}
	// ==========================================================================================================================================
	public function setvalorMensalidade($valorMensalidade) {
		$this->setvalorMensalidade = $valorMensalidade;
	}
	public function getvalorMensalidade() {
		return $this->valorMensalidade;
	}
	
	

	function cadastrarCategoria(){
			
		try {
			
			$pdo = new PDO('mysql:host=localhost;port='.$this->port.';dbname=base_pedidos', 'root', '');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $pdo->prepare('INSERT INTO categorias(codigoAluno, nomeAluno, nomeAtividade, valorMensalidade) VALUES (:codigoAluno, :nomeAluno, :nomeAtividade, :valorMensalidade)');
			$stmt->execute(array(
					':codigoAluno' => $this->codigoAluno,
					':nomeAluno'   => $this->nomeAluno,
					':nomeAtividade' => $this->nomeAtividade,
					':valorMensalidade' => $this->valorMensalidade
			));
			echo 'Aluno inserido com sucesso.';
		} catch(PDOException $e) { 
			echo 'Erro na inserção do aluno.';
		}
	}	
	
	function listarCategoria(){
			
		try {
				
			$pdo = new PDO('mysql:host=localhost;port='.$this->port.';dbname=base_pedidos', 'root', '');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
			$consulta = $pdo->query("SELECT codigoAluno, nomeAluno, nomeAtividade, valorMensalidade FROM categorias;");
			
			echo "<body  background='img/back.jpg'>";
			echo "<table border=0 width='95%'>";			
			echo "<tr>";
			echo "<th>Aluno</th>";
			echo "<th>Descrição do Aluno</th>";
			echo "<th>Valor da Mensalidade</th>";
			echo "<th width='10'><center>Alterar</center></th>";
			echo "<th width='10'><center>Excluir</center></th>";
			echo "</tr>";
			$cont=0;
			while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
				
				echo "<tr>";
				echo "<td><div class='fonte'>". $linha['nomeAluno'] ."</div></td>";
				echo "<td><div class='fonte'>". $linha['nomeAtividade'] ."</div></td>";
				echo "<td><div class='fonte'>". $linha['valorMensalidade'] ."</div></td>";
				
				$caminho = "index.php?pag=categoria_exc&codigoAluno=".$linha['codigoAluno'];
				$index = "index.php";
					
				echo "<td class='fonte'><center><a href='index.php?pag=categoria_con&codigoAluno=" .$linha['codigoAluno']. "'> <img src='img/editar.png'></a></center></td>";
				echo "<td class='fonte'><center>";
				echo "<a href='" . $caminho . "'onClick=\"if(confirm('Confirma a exclusão do aluno ?')){window.location='" . $index . "?pag=categoria_exc&codigoAluno=" .$linha['codigoAluno']. "';}	return false\"><img src='img/deletar.png'></a></center></td>";
				echo "</tr>";
				$cont ++;
			}
			echo "<tr>";
			echo "<th colspan=9>Total de Alunos: $cont</th>";
			echo "</tr>";
			echo "</table>";
			
		} catch(PDOException $e) {
			echo 'Erro na operação de listar alunos.';
		}
	}
	
	// CONSULTAR ===================================================================================================================================
	public function consultarCategoria($codigoAluno) {
		try {
				
			$pdo = new PDO('mysql:host=localhost;port='.$this->port.';dbname=base_pedidos', 'root', '');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
			$consulta = $pdo->query("SELECT codigoAluno, nomeAluno, nomeAtividade, valorMensalidade FROM categorias WHERE codigoAluno=".$codigoAluno.";");
			
			echo "<body  background='img/back.jpg'>";
			echo "<form name='form1' method='POST' action='index.php?pag=categoria_alt'>";
			echo "<table class=tableForm border=0>";
				
			echo "<tr>";
			echo "<th colspan=2>Alterar Aluno</th>";
			echo "</tr>";
				
			while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
	
				echo "<input type=hidden name=codigoAluno value=" .  $linha['codigoAluno'] . "";
				echo "<tr>";
				echo "<td>Aluno</td>";
				echo "<td><input required=required class=inputText type=text name=nomeAluno value='" .  $linha['nomeAluno'] . "'></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Descrição do Aluno</td>";
				echo "<td><textarea required=required class=inputText name=nomeAtividade>" .  $linha['nomeAtividade'] . "</textarea>";
				echo "</tr>";
				echo "<td>Valor da Mensalidade</td>";
				echo "<td><input required=required type='number' min='0.00' step='0.01' class=inputText name=valorMensalidade value='" .  $linha['valorMensalidade'] . "'></td>";
				echo "</tr>";
	
			}
				
			echo "<tr>";
			echo "<td colspan='2'>";
			echo "<div class=alinhamento_botao>";
			echo "<input class='botao' type='submit' value='Alterar'>";
			echo "\t";
			echo "<input class='botao' type='button' value='Voltar' onClick='history.go(-1)'>";
			echo "</div>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";		
		
		} catch(PDOException $e) {
			echo 'Erro na operação de consulta';
		}
	}
	
	// ALTERA ========================================================================
	public function alterarCategoria($codigoAluno, $nomeAluno, $nomeAtividade, $valorMensalidade) {
		if (isset ( $codigoAluno )) {
				
			try {
				$pdo = new PDO('mysql:host=localhost;port='.$this->port.';dbname=base_pedidos', 'root', '');
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				$stmt = $pdo->prepare('UPDATE categorias SET nomeAluno = :nomeAluno, nomeAtividade = :nomeAtividade, valorMensalidade = :valorMensalidade WHERE codigoAluno = :codigoAluno');
				$stmt->execute(array(
						':codigoAluno'   => $codigoAluno,
						':nomeAluno' => $nomeAluno,
						':nomeAtividade' => $nomeAtividade,
						':valorMensalidade' => $valorMensalidade
				));
				
				echo $stmt->rowCount();
			} catch(PDOException $e) {
				echo 'Error: ' . $e->getMessage();
			}
		}
	}
	
	// EXCLUI ========================================================================
	public function excluiCategoria($codigoAluno) {
		if (isset( $codigoAluno )) {
			
			try {			
			$pdo = new PDO('mysql:host=localhost;port='.$this->port.';dbname=base_pedidos', 'root', '');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$stmt = $pdo->prepare('DELETE FROM categorias WHERE codigoAluno = :codigoAluno');
			$stmt->bindParam(':codigoAluno', $codigoAluno);
			$stmt->execute();		
			
			echo $stmt->rowCount();			
			} catch(PDOException $e) {
				echo 'Error: ' . $e->getMessage();
			}
		}
	}
		
	
}

?>