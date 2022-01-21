<?php
    session_start();
    require_once '../../includes/classes/Atividade_Aluno.php';
    require_once '../../includes/classes/Conexao.php';

    $atividades = new AtividadeAluno();
    $id = intval($_GET['id']);
    $resultado = $atividades->Delete($id);
?>