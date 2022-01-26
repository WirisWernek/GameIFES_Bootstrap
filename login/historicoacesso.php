<?php
session_start();
require_once '../includes/classes/Conexao.php';
require_once '../includes/classes/Historico.php';

$conexao = Conexao::Conectar();
$acesso = new Historico();
$option = $conexao->escape_string($_GET['opcao']);

if ($option == "Login") {
    $acesso->Login($_SESSION['id']);
    switch ($_SESSION['id']) {
        case 1:
            header('Location: ../users/admin/index.php');
            break;
        case 2:
            header('Location: ../users/teacher/index.php');
            break;
        case 3:
            header('Location: ../users/user/home/index.php');
            break;
        default:
            $hora_login = new DateTime('now');
            $_SESSION['historico'] = $hora_login->format('%H:%i:%s');
            $_SESSION['mensagem'] = "Falha na leitura dos dados!";
            header('Location: ../index.php');
            break;
    }
} else if ($option == "Logout") {
    $acesso->Logout($_SESSION['id']);
    $_SESSION['id'] = "";
    $_SESSION['nome'] = "";
    $_SESSION['tipo'] = "";
    header('Location: ../index.php');
} else if ($option == "Create") {
    $acesso->Create($_SESSION['historico']);
    header('Location: ../users/admin/list/listusers.php');
} else {
    $_SESSION['mensagem'] = "Ocorreu um erro!";
    header('Location: ../index.php');
}

// <?php
// $datetime1 = date_create('2009-10-11 10:45:50');
// $datetime2 = date_create('2009-10-13 11:50:00');
// $interval = date_diff($datetime1, $datetime2);
// echo $interval->format('Diferença: %H:%i:%s');