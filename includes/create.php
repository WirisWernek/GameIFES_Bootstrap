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
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/index.php');
        }
    }
    
    function registerworkcategory(){
        require_once './db_connection.php';
        $descricao = mysqli_escape_string($connect, $_POST['descricao']);
        $sql = "INSERT INTO categoriaatividade(descricao) VALUES('$descricao');";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/teacher/index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/index.php');
        }
    }

    function registerwork(){
        require_once './db_connection.php';
        $descricao = mysqli_escape_string($connect, $_POST['descricao']);
        $categoria = intval(mysqli_escape_string($connect, $_POST['categoria']));
        $nivel = intval(mysqli_escape_string($connect, $_POST['nivel']));
        $sql = "INSERT INTO atividade(descricacao, categoriaatividadeid, nivelatividadeid) VALUES('$descricao', '$categoria', '$nivel');";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/teacher/index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/index.php');
        }
    }

    function registeruser(){
        require_once './db_connection.php';
        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $login =  mysqli_escape_string($connect, $_POST['login']);
        $senha =  mysqli_escape_string($connect, $_POST['senha']);
        $perfilusuario =  intval(mysqli_escape_string($connect, $_POST['perfilusuario']));
    
        $sql = "INSERT INTO usuario(nomeCompletoUsuario, senha, `login`, dataCadastro, perfilUsuarioID) VALUES('$nome', '$senha', '$login', now(), '$perfilusuario');";
    
        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/admin/index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo mysqli_error($connect);
            // header('Location: ../users/admin/index.php');
        }
    }

    function registerboard(){
        require_once './db_connection.php';
        $descricao = mysqli_escape_string($connect, $_POST['descricao']);
        $planta = mysqli_escape_string($connect, $_POST['planta']);
    
        $sql = "INSERT INTO tabuleiro(descricao, plantaTabuleiro, dataCriacao) VALUES('$descricao', '$planta', now());";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/teacher/index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/index.php');
        }
    }

    switch($_POST['opcao']){
        case 'criarNivel':
            registerworklevel();
            break;
        case 'criarCategoria':
            registerworkcategory();
            break;
        case 'criarAtividade':
            registerwork();
            break;
        case 'criarUsuario':
            registeruser();
            break;
        case 'criarTabuleiro':
            registerboard();
            break;
        default:
        echo "Não foi possível realizar a operação!";
            break;
    }

?>