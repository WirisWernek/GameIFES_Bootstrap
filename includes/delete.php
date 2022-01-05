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
    
    function deleteactivitycategory(){
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

    switch($_POST['opcao']){
        case 'deletarNivel':
            deleteworklevel();
            break;
        case 'deletarCategoria':
            deleteactivitycategory();
            break;
        default:
        echo "Não foi possível realizar a operação!";
            break;
    }

?>