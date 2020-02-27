<?php
//Sessão
session_start();
//conexão
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])):
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
	$contato = mysqli_escape_string($connect, $_POST['contato']);
	$placa = mysqli_escape_string($connect, $_POST['orcamento']);

	$id = mysqli_escape_string($connect, $_POST['id']);



	$sql = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome', contato = '$contato', placa = '$placa' WHERE id = '$id'";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Atualizado com suceeso!";
		header('Location: ../index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar";
		header('Location: ../index.php');
	endif;
endif;