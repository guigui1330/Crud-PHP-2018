<?php
include_once ("conexao.php");

	$id=filter_input(INPUT_GET,'id', FILTER_SANITIZE_SPECIAL_CHARS);
	
	$delete=$conexao->query("delete from dados where id='$id'");
	if(mysqli_affected_rows($conexao)>0)
	{
		header("Location:consulta.php");
	}
	else
	{	
		echo"Erro!<br><a href='inicio.html'>Início</a>";
	}
?>