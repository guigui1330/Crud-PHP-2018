<?php
	include_once ("conexao.php");
	$filtro= isset($_GET['filtro'])?$_GET['filtro']:"id";	
	$busca= isset($_GET['busca'])?$_GET['busca']:"";
	//procurar tudo de dados 
	$sql1= "select * from dados where $filtro like '%$busca%'";
	$consulta1=mysqli_query($conexao, $sql1);
	$sql= "select * from dados order by id desc";
	$consulta=mysqli_query($conexao, $sql);
	//vai pega o total de registro
	$registro=mysqli_num_rows($consulta1);
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
			<p><strong style="color:white ; font-size: 40px;">Consulta aos cadastros</strong></style>
			<a href="inicio.html" style="margin-left: 52.3%;">Início</a><br>
			<form method="get" action="">
			Filtro de pesquisas:
			<input type="radio" name="filtro" value="id"checked > ID
			<input type="radio" name="filtro" value="descricao" > Descrição
			<input type="radio" name="filtro" value="quantidade"> Quantidade
			<input type="radio" name="filtro" value="peso"> Peso
			<input type="radio" name="filtro" value="val"> Validade
			<input type="radio" name="filtro" value="valor"> Valor
			<input type="radio" name="filtro" value="cor"> Cor
			
			<?php
				if($filtro=='id')
				{
					print "<br>Filtro: <input type='text' class='campo' name='busca'>";
				}
				elseif ($filtro == 'descricao') {
					print "<br>Filtro: <input type='text' class='campo' name='busca'>";
				}
				elseif ($filtro == 'quantidade') {
					print "<br>Filtro: <input type='text' class='campo' name='busca'>";
				}
				elseif ($filtro == 'peso') {
					print "<br>Filtro: <input type='text' class='campo' name='busca'>";
				}
				elseif ($filtro == 'val') {
					print "<br>Filtro: <input type='text' class='campo' name='busca'>";
				}
				elseif ($filtro == 'valor') {
					print "<br>Filtro: <input type='text' class='campo' name='busca'>";
				}
				elseif ($filtro == 'cor') {
					print "<br>Filtro: <input type='text' class='campo' name='busca'>";
				}
			?>
			<input type="submit" value="Ok" class="linha2">
			</form>
			</div>
			<div class="ok">
			
			<?php
				print "<div class='linha'>";
				print "<center><strong>$registro</strong> registros cadastados.</center><br>";
				
				while($exibir=mysqli_fetch_array($consulta1)){
					$codigo= $exibir[0];
					$descricao= $exibir[1];
					$quantidade= $exibir[2];
					$peso= $exibir[3];
					$validade= $exibir[4];
					$valor= $exibir[5];
					$cor= $exibir[6];
					
					
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
					echo "Cor: ". $cor."<br><a href='editar.php?id=$codigo' class='ok'>Editar</a> 
											<a href='delete.php?id=$codigo' class='ok'>Deletar</a>"."<br><br><br>";
				}
				print "</div>";
				?>
				
	</fieldset></div>
	</body>
</html>