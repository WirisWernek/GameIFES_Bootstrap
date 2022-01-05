<?php
    session_start();
    function updateworklevel(){
        require_once './db_connection.php';
        $id = mysqli_escape_string($connect, $_POST['id']);
        $descricao = mysqli_escape_string($connect, $_POST['descricao']);
        $sql = "UPDATE nivelatividade SET descricaoNivel='$descricao' WHERE idnivelAtividade = '$id';";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/teacher/index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            header('Location: ../users/teacher/index.php');
        }
    }
    
    function updateactivitycategory(){
        require_once './db_connection.php';
        $id = mysqli_escape_string($connect, $_POST['id']);
        $descricao = mysqli_escape_string($connect, $_POST['descricao']);
        $sql = "UPDATE categoriaatividade SET descricao='$descricao' WHERE idcategoriaAtividade = '$id';";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/teacher/index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            header('Location: ../users/teacher/index.php');
        }
    }

    switch($_POST['opcao']){
        case 'atualizarNivel':
            updateworklevel();
            break;
        case 'atualizarCategoria':
            updateactivitycategory();
            break;
        default:
        echo "Não foi possível realizar a operação!";
            break;
    }

?>