<?php
    session_start();
    require_once '../../includes/db_connection.php';
    $id = intval($_GET['id']);
    $sql = "UPDATE atividade_aluno SET `status`='Finalizado', datafim = now() WHERE idatividade_aluno = '$id';";
    
    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem']= "Atividade Finalizado com sucesso!";
        header('Location: ./index.php');
    }else{
        $_SESSION['mensagem']= "Erro ao finalizar atividade!";
        echo mysqli_error($connect);
        // header('Location: ./index.php');
    }

?>