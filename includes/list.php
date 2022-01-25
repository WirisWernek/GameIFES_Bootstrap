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
    require_once('../../../includes/classes/Conexao.php');
    require_once('../../../includes/classes/Usuario.php');
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

function listbackgroundboard()
{
    require_once('../../../includes/classes/Conexao.php');
    require_once('../../../includes/classes/Imagem_Tabuleiro.php');
    $imagem = new ImagemTabuleiro();
    $imagem->Read();
}
function  listimageboard()
{
    require_once '../../../includes/db_connection.php';
    $sql = "call tabuleiro_imagem();";
    $resultado = mysqli_query($connect, $sql);
    while ($dados = mysqli_fetch_assoc($resultado)) {
        echo '<form action="../../../includes/delete.php" method="post">';
        echo '<input type="hidden" name="opcao" value="deletarImagemTabuleiro">';
        echo '<input type="hidden" name="id" value="' . $dados['ID'] . '">';
        echo '<label for="imagem">Imagem: </label>';
        echo '<input type="text" name="imagem" id="imagem" value="' . $dados['Imagem'] . '" disabled>';
        echo '<label for="posicao">Posição: </label>';
        echo '<input type="number" name="posicao" id="posicao" value="' . $dados['Posicao'] . '" disabled>';
        echo '<label for="tabuleiro">Tabuleiro: </label>';
        echo '<input type="text" name="tabuleiro" id="tabuleiro" value="' . $dados['Tabuleiro'] . '" disabled>';
        echo '<a href="../update/updateimageboard.php?id=' . $dados['ID'] . '" >Editar</a>';
        echo '<button type="submit" >Excluir</button>';
        echo '<br>';
        echo '</form>';
    }
}
