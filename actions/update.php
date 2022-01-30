<?php
session_start();
function updateworklevel()
{
    require_once('../includes/classes/Conexao.php');
    require_once('../includes/classes/Nivel_Atividade.php');
    $nivel = new NivelAtividade();
    $conexao = $nivel->getConexao();
    $resultado = $nivel->Update($_POST['id'], $_POST['descricao']);

    if ($resultado) {
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../users/teacher/list/listworklevel.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        echo $conexao->error;
    }
}

function updateworkcategory()
{
    require_once('../includes/classes/Conexao.php');
    require_once('../includes/classes/Categoria_Atividade.php');
    $categoria = new CategoriaAtividade();
    $conexao = $categoria->getConexao();
    $resultado = $categoria->Update($_POST['id'], $_POST['descricao']);

    if ($resultado) {
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../users/teacher/list/listworkcategory.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        echo $conexao->error;
    }
}

function updatework()
{
    require_once('../includes/classes/Conexao.php');
    require_once('../includes/classes/Atividade.php');
    $atividade = new Atividade();
    $conexao = $atividade->getConexao();
    $resultado = $atividade->Update($_POST['id'], $_POST['descricao'], $_POST['categoria'], $_POST['nivel']);

    if ($resultado) {
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../users/teacher/list/listwork.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        echo $conexao->error;
    }
}

function updateuser()
{
    require_once('../includes/classes/Conexao.php');
    require_once('../includes/classes/Usuario.php');
    $usuario = new Usuario();
    $conexao = $usuario->getConexao();
    $resultado = $usuario->Update($_POST['id'], $_POST['nome'], $_POST['login'], $_POST['senha'], $_POST['perfilusuario']);

    if ($resultado) {
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../users/admin/index.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        echo $conexao->error;
    }
}

function updateboard()
{
    require_once('../includes/classes/Conexao.php');
    require_once('../includes/classes/Tabuleiro.php');
    $tabuleiro = new Tabuleiro();
    $conexao = $tabuleiro->getConexao();
    $resultado = $tabuleiro->Update($_POST['id'], $_POST['descricao'], $_POST['planta']);
    if ($resultado) {
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../users/teacher/list/listboard.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        echo $conexao->error;
    }
}
function updatebackgroundboard()
{
    require_once('../includes/classes/Conexao.php');
    require_once('../includes/classes/Imagem_Tabuleiro.php');
    $imagem = new ImagemTabuleiro();
    $conexao = $imagem->getConexao();
    $resultado = $imagem->Update($_POST['id'], $_POST['url'], $_POST['tipo']);
    if ($resultado) {
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../users/teacher/list/listbackgroundboard.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        echo $conexao->error;
    }
}
function updateimageboard()
{
    require_once('../includes/classes/Conexao.php');
    require_once('../includes/classes/Imagem_Tabuleiro_Imagem.php');
    $imagemTabuleiro = new ImagemTabuleiroImagem();
    $conexao = $imagemTabuleiro->getConexao();
    $resultado = $imagemTabuleiro->Update($_POST['id'], $_POST['imagem'], $_POST['tabuleiro'],  $_POST['posicao']);
    if ($resultado) {
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../users/teacher/list/listimageboard.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        echo $conexao->error;
    }
}

switch ($_POST['opcao']) {
    case 'atualizarNivel':
        updateworklevel();
        break;
    case 'atualizarCategoria':
        updateworkcategory();
        break;
    case 'atualizarAtividade':
        updatework();
        break;
    case 'atualizarUsuario':
        updateuser();
        break;
    case 'atualizarTabuleiro':
        updateboard();
        break;
    case 'atualizarFundoTabuleiro':
        updatebackgroundboard();
        break;
    case 'atualizarImagemTabuleiro':
        updateimageboard();
        break;
    default:
        echo "Não foi possível realizar a operação!";
        break;
}
