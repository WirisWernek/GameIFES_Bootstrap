<?php
session_start();
require_once '../includes/classes/Conexao.php';
require_once '../includes/classes/Historico.php';

$conexao = Conexao::Conectar();
$acesso = new Historico();
$option = $conexao->escape_string($_GET['opcao']);

if ($option == "Login") {
    $acesso->Login($_SESSION['id']);
    switch ($_SESSION['tipo']) {
        case 1:
            header('Location: ../users/admin/index.php');
            break;
        case 2:
            header('Location: ../users/teacher/index.php');
            break;
        case 3:
            header('Location: ../users/user/index.php');
            break;
        default:
            $hora_login = new DateTime('now');
            $_SESSION['mensagem'] = "Falha na leitura dos dados!";
            header('Location: ../index.php');
            break;
    }
} else if ($option == "Logout") {
    $id = intval($_SESSION['id']);
    $acesso->Logout($id);
    $_SESSION['id'] = "";
    $_SESSION['nome'] = "";
    $_SESSION['tipo'] = "";
    header('Location: ../index.php');
} else if ($option == "Create") {
    $acesso->Create($_SESSION['historico']);
    $conexao = Conexao::Conectar();
    $id =  intval($conexao->escape_string($_SESSION['historico']));
    $sql = "UPDATE usuario SET idhistoricoacessos = $id WHERE idusuario=$id";
    $conexao->query($sql);
    header('Location: ../users/admin/list/listusers.php');
} else {
    $_SESSION['mensagem'] = "Ocorreu um erro!";
    header('Location: ../index.php');
}
