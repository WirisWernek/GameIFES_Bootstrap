<?php
session_start();
function deleteworklevel()
{
    include_once '../includes/classes/Conexao.php';
    include_once '../includes/classes/Nivel_Atividade.php';
    $nivel = new NivelAtividade();
    $conexao = $nivel->getConexao();
    $resultado = $nivel->Delete($_POST['id']);

    if ($resultado) {
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../users/teacher/list/listworklevel.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao deletar!";
        echo $conexao->error;
    }
}

function deleteworkcategory()
{
    include_once '../includes/classes/Conexao.php';
    include_once '../includes/classes/Categoria_Atividade.php';
    $categoria = new CategoriaAtividade();
    $conexao = $categoria->getConexao();
    $resultado = $categoria->Delete($_POST['id']);

    if ($resultado) {
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../users/teacher/list/listworkcategory.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao deletar!";
        echo $conexao->error;
    }
}

function deletework()
{
    include_once '../includes/classes/Conexao.php';
    include_once '../includes/classes/Atividade.php';
    $atividade = new Atividade();
    $conexao = $atividade->getConexao();
    $resultado = $atividade->Delete($_POST['id']);

    if ($resultado) {
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../users/teacher/list/listwork.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao deletar!";
        echo $conexao->error;
    }
}

function deleteuser()
{
    include_once '../includes/classes/Conexao.php';
    include_once '../includes/classes/Usuario.php';
    $usuario = new Usuario();
    $conexao = $usuario->getConexao();
    $resultado = $usuario->Delete($_POST['id']);

    if ($resultado) {
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../users/admin/list/listusers.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao deletar!";
        echo $conexao->error;
    }
}
function deleteboard()
{
    include_once '../includes/classes/Conexao.php';
    include_once '../includes/classes/Tabuleiro.php';
    $tabuleiro = new Tabuleiro();
    $conexao = $tabuleiro->getConexao();
    $resultado = $tabuleiro->Delete($_POST['id']);

    if ($resultado) {
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../users/teacher/list/listboard.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao deletar!";
        echo $conexao->error;
    }
}
function deletebackgroundboard()
{
    include_once '../includes/classes/Conexao.php';
    include_once '../includes/classes/Imagem_Tabuleiro.php';
    $imagem = new ImagemTabuleiro();
    $conexao = $imagem->getConexao();
    $resultado = $imagem->Delete($_POST['id']);

    if ($resultado) {
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../users/teacher/list/listbackgroundboard.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao deletar!";
        echo $conexao->error;
    }
}
function deleteimageboard()
{
    include_once '../includes/classes/Conexao.php';
    include_once '../includes/classes/Imagem_Tabuleiro_Imagem.php';
    $imagemTabuleiro = new ImagemTabuleiroImagem();
    $conexao = $imagemTabuleiro->getConexao();
    $resultado = $imagemTabuleiro->Delete($_POST['id']);

    if ($resultado) {
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../users/teacher/list/listimageboard.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao deletar!";
        echo $conexao->error;
    }
}

switch ($_POST['opcao']) {
    case 'deletarNivel':
        deleteworklevel();
        break;
    case 'deletarCategoria':
        deleteworkcategory();
        break;
    case 'deletarAtividade':
        deletework();
        break;
    case 'deletarUsuario':
        deleteuser();
        break;
    case 'deletarTabuleiro':
        deleteboard();
        break;
    case 'deletarFundoTabuleiro':
        deletebackgroundboard();
        break;
    case 'deletarImagemTabuleiro':
        deleteimageboard();
        break;
    default:
        echo "Não foi possível realizar a operação!";
        break;
}
