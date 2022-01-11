<?php
session_start();
require_once '../includes/db_connection.php';
if(isset($_POST['btn-login'])){
    $login =  mysqli_escape_string($connect, $_POST['login']);
    $senha =  mysqli_escape_string($connect, $_POST['senha']);
    
    $sql = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha';";

    if($resultado = mysqli_query($connect, $sql)){
        if(mysqli_num_rows($resultado) > 0){
            $dados = mysqli_fetch_assoc($resultado);
            switch($dados['perfilUsuarioID']){
                case '1':
                    $_SESSION['id'] = $dados['idusuario'];
                    $_SESSION['nome'] = $dados['nomeCompletoUsuario'];
                    $_SESSION['tipo'] = $dados['perfilUsuarioID'];
                    $_SESSION['mensagem'] = "Login efetuado com sucesso!";
                    header('Location: ../users/admin/index.php');
                    break;
                case '2':
                    $_SESSION['id'] = $dados['idusuario'];
                    $_SESSION['nome'] = $dados['nomeCompletoUsuario'];
                    $_SESSION['tipo'] = $dados['perfilUsuarioID'];
                    $_SESSION['mensagem'] = "Login efetuado com sucesso!";
                    header('Location: ../users/teacher/index.php');
                    break;
                case '3':
                    $_SESSION['id'] = $dados['idusuario'];
                    $_SESSION['nome'] = $dados['nomeCompletoUsuario'];
                    $_SESSION['tipo'] = $dados['perfilUsuarioID'];
                    $_SESSION['mensagem'] = "Login efetuado com sucesso!";
                    header('Location: ../users/user/home/index.php');
                    break;
                default:
                    $_SESSION['mensagem'] = "Falha na leitura dos dados!";
                    header('Location: ../index.php');
                    break;
            }
        }else{
            $_SESSION['mensagem']= "Senha ou login incorretos!";
            header('Location: ../index.php');
        }
    }else{
        $_SESSION['mensagem']= "Nenhuma informação foi recebida!";
        header('Location: ../index.php');
    }
}
?>