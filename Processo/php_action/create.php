<?php
//Sessão
session_start();
//conexão
require_once 'db_connect.php';

if(isset($_POST['btn-cadastrar'])):
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
	$contato = mysqli_escape_string($connect, $_POST['contato']);
	$placa = mysqli_escape_string($connect, $_POST['placa']);


	$sql = "INSERT INTO clientes (nome, sobrenome, contato, placa) VALUES ('$nome', '$sobrenome', '$contato', '$placa')";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Cadastrado com suceeso!";
		header('Location: ../index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao Cadastrar";
		header('Location: ../index.php');
	endif;
endif;