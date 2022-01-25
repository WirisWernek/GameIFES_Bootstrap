<?php
    session_start();
    function deleteworklevel(){
        include_once './classes/Conexao.php';
        include_once './classes/Nivel_Atividade.php';
        $nivel = new NivelAtividade();
        $conexao = $nivel->getConexao();
        $resultado = $nivel->Delete($_POST['id']);

        if($resultado){
            $_SESSION['mensagem']= "Deletado com sucesso!";
            header('Location: ../users/teacher/list/listworklevel.php');
        }else{
            $_SESSION['mensagem']= "Erro ao deletar!";
            echo $conexao->error;
        }
    }
    
    function deleteworkcategory(){
        include_once './classes/Conexao.php';
        include_once './classes/Categoria_Atividade.php';
        $categoria = new CategoriaAtividade();
        $conexao = $categoria->getConexao();
        $resultado = $categoria->Delete($_POST['id']);

        if($resultado){
            $_SESSION['mensagem']= "Deletado com sucesso!";
            header('Location: ../users/teacher/list/listworkcategory.php');
        }else{
            $_SESSION['mensagem']= "Erro ao deletar!";
            echo $conexao->error;
        }
    }

    function deletework(){
        include_once './classes/Conexao.php';
        include_once './classes/Atividade.php';
        $atividade = new Atividade();
        $conexao = $atividade->getConexao();
        $resultado = $atividade->Delete($_POST['id']);

        if($resultado){
            $_SESSION['mensagem']= "Deletado com sucesso!";
            header('Location: ../users/teacher/list/listwork.php');
        }else{
            $_SESSION['mensagem']= "Erro ao deletar!";
            echo $conexao->error;
        }
    }

    function deleteuser(){
        include_once './classes/Conexao.php';
        include_once './classes/Usuario.php';
        $usuario = new Usuario();
        $conexao = $usuario->getConexao();
        $resultado = $usuario->Delete($_POST['id']);

        if($resultado){
            $_SESSION['mensagem']= "Deletado com sucesso!";
            header('Location: ../users/admin/list/listusers.php');
        }else{
            $_SESSION['mensagem']= "Erro ao deletar!";
            echo $conexao->error;
        }
    }
    function deleteboard(){
        require_once './db_connection.php';
        $id = mysqli_escape_string($connect, $_POST['id']);
        $sql = "DELETE FROM tabuleiro WHERE idtabuleiro = '$id';";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Deletado com sucesso!";
            header('Location: ../users/teacher/list/listboard.php');
        }else{
            $_SESSION['mensagem']= "Erro ao deletar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/list/listboard.php');
        }
    }
    function deletebackgroundboard(){
        include_once './classes/Conexao.php';
        include_once './classes/Imagem_Tabuleiro.php';
        $imagem = new ImagemTabuleiro();
        $conexao = $imagem->getConexao();
        $resultado = $imagem->Delete($_POST['id']);

        if($resultado){
            $_SESSION['mensagem']= "Deletado com sucesso!";
            header('Location: ../users/teacher/list/listbackgroundboard.php');
        }else{
            $_SESSION['mensagem']= "Erro ao deletar!";
            echo $conexao->error;
        }
    }
    function deleteimageboard(){
        require_once './db_connection.php';
        $id = mysqli_escape_string($connect, $_POST['id']);
        $sql = "DELETE FROM tabuleiro_imagenstabuleiro WHERE idtabuleiro_imagenstabuleiro = '$id';";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Deletado com sucesso!";
            header('Location: ../users/teacher/list/listimageboard.php');
        }else{
            $_SESSION['mensagem']= "Erro ao deletar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/list/listimageboard.php');
        }
    }

    switch($_POST['opcao']){
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
