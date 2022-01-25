<?php
    session_start();
    function registerworklevel(){
        require_once('./classes/Conexao.php');
        require_once('./classes/Nivel_Atividade.php');
        $nivel = new NivelAtividade();
        $conexao = $nivel->getConexao();
        $resultado = $nivel->Create($_POST['descricao']);

        if($resultado){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/teacher/list/listworklevel.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo $conexao->error;
        }
    }
    
    function registerworkcategory(){
        require_once('./classes/Conexao.php');
        require_once('./classes/Categoria_Atividade.php');
        $categoria = new CategoriaAtividade();
        $conexao = $categoria->getConexao();
        $resultado = $categoria->Create($_POST['descricao']);

        if($resultado){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/teacher/list/listworkcategory.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo $conexao->error;
        }
    }

    function registerwork(){
        require_once('./classes/Conexao.php');
        require_once('./classes/Atividade.php');
        $atividade = new Atividade();
        $conexao = $atividade->getConexao();
        $resultado = $atividade->Create($_POST['descricao'], $_POST['categoria'], $_POST['nivel']);

        if($resultado){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/teacher/list/listwork.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo $conexao->error;
        }
    }

    function registeruser(){
        require_once('./classes/Conexao.php');
        require_once('./classes/Usuario.php');
        $usuario = new Usuario();
    
        $conexao = $usuario->getConexao();
        $resultado = $usuario->Create($_POST['nome'], $_POST['login'], $_POST['senha'], $_POST['perfilusuario']);
    
        if($resultado){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/admin/list/listusers.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo $conexao->error;
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
        require_once('./classes/Conexao.php');
        require_once('./classes/Atividade_Aluno.php');
        $novaatividade = new AtividadeAluno();
        $conexao = $novaatividade->getConexao();
        $resultado = $novaatividade->Create($_POST['idUsuario'],  $_POST['idAtividade'], $_POST['tabuleiro'],$_POST['descricao']);
    
        if($resultado){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/user/index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo $conexao->error;
        }
    }

    function registerbackgroundboard(){
        require_once('./classes/Conexao.php');
        require_once('./classes/Imagem_Tabuleiro.php');
        $imagem = new ImagemTabuleiro();
        $conexao = $imagem->getConexao();
        $resultado = $imagem->Create($_POST['url'], $_POST['tipo']);
    
        if($resultado){
            $_SESSION['mensagem']= "Cadastrado com sucesso!";
            header('Location: ../users/teacher/list/listbackgroundboard.php');
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar!";
            echo $conexao->error;
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
