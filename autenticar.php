<?php
	session_start();
	include "conexao2.php";
	$login = $_GET['login'];
	$senha = $_GET['senha'];
	$consultaexiste = $conn->query("SELECT * FROM usuarios where login = '".$login."'");
	$consulta = $conn->query("SELECT * FROM usuarios where login = '".$login."' and senha = '".$senha."'");
	if($consulta->rowCount()>0){
		while($linha = $consulta -> fetch(PDO::FETCH_ASSOC)){
			if($linha['tipo']!=null){
				$_SESSION['log'] = $linha['tipo'];
				$_SESSION['user'] = $login;
				header("location:index.php");
			}else{
				echo "<script>alert('Acesso não autorizado!');</script>";
			}
		}
	}else if($consultaexiste->rowCount()==0){
		echo "<script>alert('Usuário ainda não cadastrado!'); window.location = 'login.php'; </script>";
	}else{
		echo "<script>alert('Usuário ou senha incorreta!'); window.location = 'login.php'; </script>";
	}
?>
