<?php
    session_start();
    function registerworklevel(){
        require_once './db_connection.php';
        $descricao = mysqli_escape_string($connect, $_POST['descricao']);
        $sql = "INSERT INTO nivelatividade(descricaoNivel) VALUES('$descricao');";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/teacher/index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            header('Location: ../users/teacher/index.php');
        }
    }
    
    function registeractivitycategory(){
        require_once './db_connection.php';
        $descricao = mysqli_escape_string($connect, $_POST['descricao']);
        $sql = "INSERT INTO categoriaatividade(descricao) VALUES('$descricao');";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/teacher/index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            header('Location: ../users/teacher/index.php');
        }
    }

    switch($_POST['opcao']){
        case 'criarNivel':
            registerworklevel();
            break;
        case 'criarCategoria':
            registeractivitycategory();
            break;
        default:
        echo "Não foi possível realizar a operação!";
            break;
    }

?>