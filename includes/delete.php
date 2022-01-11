<?php
    session_start();
    function deleteworklevel(){
        require_once './db_connection.php';
        $id = mysqli_escape_string($connect, $_POST['id']);
        $sql = "DELETE FROM nivelatividade WHERE idnivelAtividade = '$id';";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Deletado com sucesso!";
            header('Location: ../users/teacher/index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao deletar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/index.php');
        }
    }
    
    function deleteworkcategory(){
        require_once './db_connection.php';
        $id = mysqli_escape_string($connect, $_POST['id']);
        $sql = "DELETE FROM categoriaatividade WHERE idcategoriaAtividade = '$id';";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Deletado com sucesso!";
            header('Location: ../users/teacher/index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao deletar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/index.php');
        }
    }

    function deletework(){
        require_once './db_connection.php';
        $id = mysqli_escape_string($connect, $_POST['id']);
        $sql = "DELETE FROM atividade WHERE idatividade = '$id';";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Deletado com sucesso!";
            header('Location: ../users/teacher/index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao deletar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/index.php');
        }
    }

    function deleteuser(){
        require_once './db_connection.php';
        $id = mysqli_escape_string($connect, $_POST['id']);
        $sql = "DELETE FROM usuario WHERE idusuario = '$id';";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Deletado com sucesso!";
            header('Location: ../users/admin/index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao deletar!";
            echo mysqli_error($connect);
            // header('Location: ../users/admin/index.php');
        }
    }
    function deleteboard(){
        require_once './db_connection.php';
        $id = mysqli_escape_string($connect, $_POST['id']);
        $sql = "DELETE FROM tabuleiro WHERE idtabuleiro = '$id';";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Deletado com sucesso!";
            header('Location: ../users/teacher/index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao deletar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/index.php');
        }
    }
    function deletebackgroundboard(){
        require_once './db_connection.php';
        $id = mysqli_escape_string($connect, $_POST['id']);
        $sql = "DELETE FROM imagenstabuleiro WHERE idimagenstabuleiro = '$id';";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Deletado com sucesso!";
            header('Location: ../users/teacher/index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao deletar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/index.php');
        }
    }
    function deleteimageboard(){
        require_once './db_connection.php';
        $id = mysqli_escape_string($connect, $_POST['id']);
        $sql = "DELETE FROM tabuleiro_imagenstabuleiro WHERE idtabuleiro_imagenstabuleiro = '$id';";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Deletado com sucesso!";
            header('Location: ../users/teacher/index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao deletar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/index.php');
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

?>