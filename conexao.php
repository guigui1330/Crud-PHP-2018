<?php
	$local= "localhost";
	$username= "root";
	$password= "";
	$database= "cadastro";
	$conexao= mysqli_connect($local, $username, $password, $database);
	
	if(!$conexao){
		print "Falha na conexão";
	}
?>