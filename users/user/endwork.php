<?php
session_start();
require_once '../../includes/classes/Conexao.php';
require_once '../../includes/classes/Atividade_Aluno.php';
$atividades = new AtividadeAluno();
$conexao = $atividades->getConexao();
$resultado = $atividades->Delete($_GET['id']);
if ($resultado) {
    $_SESSION['mensagem'] = "Atividade Finalizado com sucesso!";
    header('Location: ./index.php');
} else {
    $_SESSION['mensagem'] = "Erro ao finalizar atividade!";
    echo $conexao->error;
}
