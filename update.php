<?php
	include_once ("conexao.php");
	session_start();
	$id=$_SESSION['id'];
	
	$descricao=$_POST['descri'];
	$quantidade=$_POST['qnt'];
	$peso=$_POST['peso'];
	$validade=$_POST['validade'];
	$valor=$_POST['valor'];
	$cor=$_POST['cor'];
	
	$atualiza=$conexao->query("update dados set descricao='$descricao', quantidade='$quantidade', peso='$peso', 
								val='$validade', valor='$valor', cor='$cor' where id='$id'");
	$sucesso=mysqli_affected_rows($conexao);
	if($sucesso>0)
	{
		echo"Atualizado com sucesso!<br><a href='inicio.html'>Início</a>";
	}
	else
	{	
		echo"Erro!<br><a href='inicio.html'>Início</a>";
	}
	
?>