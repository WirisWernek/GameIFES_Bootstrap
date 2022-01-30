<?php
function listcategory()
{
    include_once '../../../includes/classes/Conexao.php';
    include_once '../../../includes/classes/Categoria_Atividade.php';
    $categoria = new CategoriaAtividade();
    $categoria->Read();
}

function listlevel()
{
    include_once '../../../includes/classes/Conexao.php';
    include_once '../../../includes/classes/Nivel_Atividade.php';
    $nivel = new NivelAtividade();
    $nivel->Read();
}

function listwork()
{
    require_once('../../../includes/classes/Conexao.php');
    require_once('../../../includes/classes/Atividade.php');
    $atividade = new Atividade();
    $atividade->Read();
}

function listusers()
{
    require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/classes/Conexao.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/classes/Usuario.php');
    $usuario = new Usuario();
    $usuario->Read();
}

function listboard()
{
    require_once('../../../includes/classes/Conexao.php');
    require_once('../../../includes/classes/Tabuleiro.php');
    $tabuleiro = new Tabuleiro();
    $tabuleiro->Read();
}

function listimages()
{
    require_once('../../../includes/classes/Conexao.php');
    require_once('../../../includes/classes/Imagem_Tabuleiro.php');
    $imagem = new ImagemTabuleiro();
    $imagem->Read();
}
function listbackgroundboard()
{
    require_once('../../../includes/classes/Conexao.php');
    require_once('../../../includes/classes/Imagem_Tabuleiro_Imagem.php');
    $imagemTabuleiro = new ImagemTabuleiroImagem();
    $imagemTabuleiro->Read();
}
