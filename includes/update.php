<?php
    session_start();
    function updateworklevel(){
        require_once('./classes/Conexao.php');
        require_once('./classes/Nivel_Atividade.php');
        $nivel = new NivelAtividade();
        $conexao = $nivel->getConexao();
        $resultado = $nivel->Update($_POST['id'], $_POST['descricao']);

        if($resultado){
            $_SESSION['mensagem']= "Atualizado com sucesso!";
            header('Location: ../users/teacher/list/listworklevel.php');
        }else{
            $_SESSION['mensagem']= "Erro ao atualizar!";
            echo $conexao->error;
        }
    }
    
    function updateworkcategory(){
        require_once('./classes/Conexao.php');
        require_once('./classes/Categoria_Atividade.php');
        $categoria = new CategoriaAtividade();
        $conexao = $categoria->getConexao();
        $resultado = $categoria->Update($_POST['id'], $_POST['descricao']);

        if($resultado){
            $_SESSION['mensagem']= "Atualizado com sucesso!";
            header('Location: ../users/teacher/list/listworkcategory.php');
        }else{
            $_SESSION['mensagem']= "Erro ao atualizar!";
            echo $conexao->error;
        }
    }

    function updatework(){
        require_once('./classes/Conexao.php');
        require_once('./classes/Atividade.php');
        $atividade = new Atividade();
        $conexao = $atividade->getConexao();
        $resultado = $atividade->Update($_POST['id'], $_POST['descricao'], $_POST['categoria'], $_POST['nivel']);
        
        if($resultado){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/teacher/list/listwork.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo $conexao->error;
        }
    }
    
    function updateuser(){
        require_once('./classes/Conexao.php');
        require_once('./classes/Usuario.php');
        $usuario = new Usuario();
        $conexao = $usuario->getConexao();
        $resultado = $usuario->Update($_POST['id'], $_POST['nome'], $_POST['login'], $_POST['senha'], $_POST['perfilusuario']);

        if($resultado){
            $_SESSION['mensagem']= "Atualizado com sucesso!";
            header('Location: ../users/admin/list/listusers.php');
        }else{
            $_SESSION['mensagem']= "Erro ao atualizar!";
            echo $conexao->error;
        }
    }

    function updateboard(){
        require_once './db_connection.php';
        $id = mysqli_escape_string($connect, $_POST['id']);
        $descricao = mysqli_escape_string($connect, $_POST['descricao']);
        $planta = mysqli_escape_string($connect, $_POST['planta']);
        $sql = "UPDATE tabuleiro SET plantaTabuleiro='$planta', descricao='$descricao' WHERE idtabuleiro = '$id';";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Atualizado com sucesso!";
            header('Location: ../users/teacher/list/listboard.php');
        }else{
            $_SESSION['mensagem']= "Erro ao atualizar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/list/listboard.php');
        }
    }
    function updatebackgroundboard(){
        require_once('./classes/Conexao.php');
        require_once('./classes/Imagem_Tabuleiro.php');
        $imagem = new ImagemTabuleiro();
        $conexao = $imagem->getConexao();
        $resultado = $imagem->Update($_POST['id'], $_POST['url'], $_POST['tipo']);
        if($resultado){
            $_SESSION['mensagem']= "Atualizado com sucesso!";
            header('Location: ../users/teacher/list/listbackgroundboard.php');
        }else{
            $_SESSION['mensagem']= "Erro ao atualizar!";
            echo $conexao->error;
        }
    }
    function updateimageboard(){
        require_once './db_connection.php';
        $id = intval(mysqli_escape_string($connect, $_POST['id']));
        $imagem = intval(mysqli_escape_string($connect, $_POST['imagem']));
        $tabuleiro = intval(mysqli_escape_string($connect, $_POST['tabuleiro']));
        $posicao = intval(mysqli_escape_string($connect, $_POST['posicao']));
        $sql = "UPDATE tabuleiro_imagenstabuleiro SET tabuleiroID='$tabuleiro', imagenstabuleiroID='$imagem',  posicaoTabuleiro='$posicao' WHERE idtabuleiro_imagenstabuleiro = '$id';";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Atualizado com sucesso!";
            header('Location: ../users/teacher/list/listimageboard.php');
        }else{
            $_SESSION['mensagem']= "Erro ao atualizar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/list/listimageboard.php');
        }
    }

    switch($_POST['opcao']){
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

?>