<?php
    session_start();
    function registerworklevel(){
        require_once './db_connection.php';
        $descricao = mysqli_escape_string($connect, $_POST['descricao']);
        $sql = "INSERT INTO nivelatividade(descricaoNivel) VALUES('$descricao');";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/teacher/list/listworklevel.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/list/listworklevel.php');
        }
    }
    
    function registerworkcategory(){
        require_once './db_connection.php';
        $descricao = mysqli_escape_string($connect, $_POST['descricao']);
        $sql = "INSERT INTO categoriaatividade(descricao) VALUES('$descricao');";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/teacher/list/listworkcategory.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/list/listworkcategory.php');
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
            header('Location: ../users/teacher/list/listwork.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/list/listwork.php');
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
            header('Location: ../users/admin/list/listusers.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo mysqli_error($connect);
            // header('Location: ../users/admin/list/listusers.php');
        }
    }

    function registerboard(){
        require_once './db_connection.php';
        $descricao = mysqli_escape_string($connect, $_POST['descricao']);
        $planta = mysqli_escape_string($connect, $_POST['planta']);
    
        $sql = "INSERT INTO tabuleiro(descricao, plantaTabuleiro, dataCriacao) VALUES('$descricao', '$planta', now());";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/teacher/list/listboard.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/list/listboard.php');
        }
    }
    function initializework(){
        require_once './db_connection.php';
        $idusuario = intval(mysqli_escape_string($connect, $_POST['idUsuario']));
        $idatividade = intval(mysqli_escape_string($connect, $_POST['idAtividade']));
        $tabuleiro = intval(mysqli_escape_string($connect, $_POST['tabuleiro']));
        $descricao = mysqli_escape_string($connect, $_POST['descricao']);
        
        $sql = "INSERT INTO atividade_aluno(descricaoatividade, tabuleiroid, usuarioid, `status`, datainicio, atividadeid) VALUES('$descricao', '$tabuleiro','$idusuario', 'Iniciado', now() , '$idatividade');";
        
        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/user/index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo mysqli_error($connect);
            // header('Location: ../users/user/index.php');
        }
    }

    function registerbackgroundboard(){
        require_once './db_connection.php';
        $url = mysqli_escape_string($connect, $_POST['url']);
        $tipo = intval(mysqli_escape_string($connect, $_POST['tipo']));
    
        $sql = "INSERT INTO imagenstabuleiro(urlImagem, tipoimagemid) VALUES('$url', '$tipo');";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/teacher/list/listbackgroundboard.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/list/listbackgroundboard.php');
        }
    }
    function registerimageboard(){
        require_once './db_connection.php';
        $imagem = intval(mysqli_escape_string($connect, $_POST['url']));
        $tabuleiro = intval(mysqli_escape_string($connect, $_POST['tabuleiro']));
        $posicao = intval(mysqli_escape_string($connect, $_POST['posicao']));

    
        $sql = "INSERT INTO tabuleiro_imagenstabuleiro(imagenstabuleiroID, tabuleiroID, posicaoTabuleiro) VALUES('$imagem', '$tabuleiro', '$posicao');";

        if(mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/teacher/list/listimageboard.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo mysqli_error($connect);
            // header('Location: ../users/teacher/list/listimageboard.php');
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
        case 'iniciarAtividade':
            initializework();
            break;
        case 'criarFundoTabuleiro':
            registerbackgroundboard();
            break;
        case 'criarImagemTabuleiro':
            registerimageboard();
            break;
        default:
        echo "Não foi possível realizar a operação!";
            break;
    }

?>