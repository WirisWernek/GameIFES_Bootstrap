<?php
    session_start();
    function updateworklevel(){
        require_once './db_connection.php';
        $id = mysqli_escape_string($connect, $_POST['id']);
        $descricao = mysqli_escape_string($connect, $_POST['descricao']);
        $sql = "UPDATE nivelatividade SET descricaoNivel='$descricao' WHERE idnivelAtividade = '$id';";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Atualizado com sucesso!";
            header('Location: ../users/teacher/list/listworklevel.php');
        }else{
            $_SESSION['mensagem']= "Erro ao atualizar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/list/listworklevel.php');
        }
    }
    
    function updateworkcategory(){
        require_once './db_connection.php';
        $id = mysqli_escape_string($connect, $_POST['id']);
        $descricao = mysqli_escape_string($connect, $_POST['descricao']);
        $sql = "UPDATE categoriaatividade SET descricao='$descricao' WHERE idcategoriaAtividade = '$id';";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Atualizado com sucesso!";
            header('Location: ../users/teacher/list/listworkcategory.php');
        }else{
            $_SESSION['mensagem']= "Erro ao atualizar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/list/listworkcategory.php');
        }
    }

    function updatework(){
        require_once './db_connection.php';
        $id = mysqli_escape_string($connect, $_POST['id']);
        $descricao = mysqli_escape_string($connect, $_POST['descricao']);
        $categoria = intval(mysqli_escape_string($connect, $_POST['categoria']));
        $nivel = intval(mysqli_escape_string($connect, $_POST['nivel']));
        $sql = "UPDATE atividade SET descricacao='$descricao', categoriaatividadeid='$categoria', nivelatividadeid='$nivel' WHERE idatividade = '$id';";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Atualizado com sucesso!";
            header('Location: ../users/teacher/list/listwork.php');
        }else{
            $_SESSION['mensagem']= "Erro ao atualizar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/list/listwork.php');
        }
    }
    
    function updateuser(){
        require_once './db_connection.php';
        $id = mysqli_escape_string($connect, $_POST['id']);
        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $login = mysqli_escape_string($connect, $_POST['login']);
        $senha = mysqli_escape_string($connect, $_POST['senha']);
        $perfilusuario = intval(mysqli_escape_string($connect, $_POST['perfilusuario']));
        $sql = "UPDATE usuario SET nomeCompletoUsuario='$nome', `login`='$login', senha='$senha',perfilUsuarioID='$perfilusuario'  WHERE idusuario = '$id';";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Atualizado com sucesso!";
            header('Location: ../users/admin/list/listusers.php');
        }else{
            $_SESSION['mensagem']= "Erro ao atualizar!";
            echo mysqli_error($connect);
            // header('Location: ../users/admin/list/listusers.php');
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
        require_once './db_connection.php';
        $id = mysqli_escape_string($connect, $_POST['id']);
        $url = mysqli_escape_string($connect, $_POST['url']);
        $tipo = intval(mysqli_escape_string($connect, $_POST['tipo']));
        $sql = "UPDATE imagenstabuleiro SET urlImagem='$url', tipoimagemid='$tipo' WHERE idimagenstabuleiro = '$id';";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Atualizado com sucesso!";
            header('Location: ../users/teacher/list/listbackgroundboard.php');
        }else{
            $_SESSION['mensagem']= "Erro ao atualizar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/list/listbackgroundboard.php');
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