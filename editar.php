<?php
	session_start();
	include_once ("conexao.php");
	
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>DP</title>
		<link rel="stylesheet" href="css/estilo.css">
	</head>
	<body>
	<fieldset>
			
			<div class="ok">
			<p><strong style="color:white ; font-size: 40px;">Alteração dos cadastros</strong></style>
			<a href="inicio.html" style="margin-left: 40.7%;">Início</a> 
			<a href="consulta.php" class="botao-inicio2">Consultar</a></p>
			</div>
			<?php
				$id=filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
				$_SESSION['id']=$id;
				$select=$conexao->query("select * from dados where id='$id'");
				while($exibir=$select->fetch_assoc()){
					$descricao= $exibir['descricao'];
					$quantidade= $exibir['quantidade'];
					$peso= $exibir['peso'];
					$validade= $exibir['val'];
					$valor= $exibir['valor'];
					$cor= $exibir['cor'];
				}
			?>
			<div class="ok">
			<form action="update.php" method="post">
				<p class="linha">Descrição do produto:<br>
				<input type="text" name="descri" placeholder="Descrição" maxlength="70" value="<?php echo $descricao?>" required autofocus class="campo"></p>
				<p class="linha">Quantidade de embalagem:<br>
				<input type="number" name="qnt" min="0" max="999" placeholder="Por embalagem" value="<?php echo $quantidade?>"required class="campo"></p>
				<p class="linha">Peso unitário:<br>
				<input type="float" name="peso" placeholder="00.0" value="<?php echo $peso?>" required class="campo">kg (usar '.' para separar as gramas)</p>
				<p class="linha">Prazo de validade:<br>
				<input type="number" min="0" max="99" name="validade" value="<?php echo $validade?>" placeholder="Em meses" required class="campo"></p>  
				<p class="linha">Valor unitário:<br>
				R$ <input type="float" name="valor" placeholder="00.00" value="<?php echo $valor?>" required class="campo"> (usar '.' para separar os centavos)</p>
				<p class="linha">Cor do produto:<br>
				<input type="text" name="cor" placeholder="Ex: amarelo" maxlength="15" value="<?php echo $cor?>" required class="campo"></p>
				<input type="submit" value="Atualizar" class="linha2">
				<a href="consulta.php" style="background-color: #f44336; border: 1px;padding: 8.3px;color: white;cursor: pointer;width: 70px;height: 23px;  display: inline-block;">Cancelar</a></style><br><br>
			</form>
			</div>
	</fieldset>
	</body>
</html>