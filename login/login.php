<?php
session_start();
require_once '../includes/classes/Conexao.php';
if (isset($_POST['btn-login'])) {
    $conexao = Conexao::Conectar();
    $login = $conexao->escape_string($_POST['login']);
    $senha = $conexao->escape_string($_POST['senha']);
    $sql = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha';";

    if ($resultado = $conexao->query($sql)) {
        if ($resultado->num_rows > 0) {
            $dados = $resultado->fetch_assoc();
            switch ($dados['perfilUsuarioID']) {
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
        } else {
            $_SESSION['mensagem'] = "Senha ou login incorretos!";
            header('Location: ../index.php');
        }
    } else {
        $_SESSION['mensagem'] = "Nenhuma informação foi recebida!";
        header('Location: ../index.php');
    }
}
