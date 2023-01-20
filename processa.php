<?php
	include_once("conexao.php");
		$descricao= $_POST['descri'];
		$quantidade= $_POST['qnt'];
		$peso= $_POST['peso'];
		$validade= $_POST['validade'];
		$valor= $_POST['valor'];
		$cor= $_POST['cor'];
		//variavel q diz aonde vai armazena os bang
		$sql = " insert into dados(descricao, quantidade, peso, val, valor, cor) 
				values('$descricao','$quantidade','$peso','$validade','$valor','$cor')";
		//variavel q vai salvar no banco de dados
		$salvar = mysqli_query($conexao, $sql);
		//isso ak é pra exibir o ultimo registro, vai mostra só o "id"
		$ok="select max(id) from dados";
		$id= mysqli_query($conexao, $ok);
		
?>
<HTML>
	<HEAD>
		<meta charset="UTF-8">
		<title> Cadastro de Produtos </title>
		<link rel="stylesheet" href="css/estilo.css">
	</HEAD>
	
	<BODY>
		<fieldset><div class="ok">
		<center><h1 class="linha">Confirmação do cadastro</h1></center>
			<p class="linha3"><center>Dados cadastrados:</center></p>
			<div class="linha">
			<?php
				//esse fetch array pega ordenadamente a sequencia dos campos do banco de dado
				//começando por 0, e o nosso 0 corresponde ao id, entao $codigo vai receber o valor do ultimo id
				//vai captar o ultimo id por conta de $ok onde diz SELECT MAX(id) ou seja, o id máximo é isso meninx
				while($exibir= mysqli_fetch_array($id)){
					$codigo= $exibir[0];
				}
				print "Número do cadastro <strong>$codigo<br></strong>";
				echo "Descrição do produto: ". $descricao."<br>";
				echo "Quantidade por embalagem: ". $quantidade."<br>";
				echo "Peso: ". $peso."kg<br>";
				if($validade<=1)
				{
					echo "Validade: ". $validade." mês<br>";
				}
				else
				{
					echo "Validade: ". $validade." meses<br>";
				}
				echo "Valor unitário: R$". $valor."<br>";
				echo "Cor escolhida: ". $cor."";
				mysqli_close($conexao);
			?><br>
			</div>
			<br><center><a href="cadastro.html" class="botao-inicio">Cadastro</a> 
			<a href="consulta.php">Consulta aos dados</a>
			<a href="inicio.html">Início</a></center>
		</div></fieldset>
	</BODY>
</HTML>