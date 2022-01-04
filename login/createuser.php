<?php
session_start();
require_once '../includes/db_connection.php';
if(isset($_POST['btn-cadastrar'])){
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $login =  mysqli_escape_string($connect, $_POST['login']);
    $senha =  mysqli_escape_string($connect, $_POST['senha']);

    $sql = "INSERT INTO usuario(nomeCompletoUsuario, senha, `login`, dataCadastro, perfilUsuarioID) VALUES('$nome', '$senha', '$login', now(), 2)";

    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem']= "Cadastrado com sucesso!";
        header('Location: ../index.php');
    }else{
        $_SESSION['mensagem']= "Erro ao cadastrar!";
        header('Location: ../index.php');
    }
}
?>