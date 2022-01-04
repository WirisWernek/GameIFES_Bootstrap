<?php
session_start();
require_once '../includes/db_connection.php';
if(isset($_POST['btn-login'])){
    $login =  mysqli_escape_string($connect, $_POST['login']);
    $senha =  mysqli_escape_string($connect, $_POST['senha']);
    
    $sql = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha';";

    if(mysqli_query($connect, $sql)){
        if(mysqli_num_rows(mysqli_query($connect, $sql)) > 0){
            $_SESSION['mensagem']= "Login efetuado com sucesso!";
            header('Location: ../index.php');
        }
    }else{
        $_SESSION['mensagem']= "Erro ao cadastrar!";
        header('Location: ../index.php');
    }
}
?>