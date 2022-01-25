<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../styles/main.css">
    <title>Atividades</title>
</head>

<body>
    <main>
        <h1>Atividades Em Andamento</h1>
        <a href="./initnewwork.php">Nova Atividade</a>
        <a href="./finishedwork.php">Atividades Finalizadas</a>
        <?php
        require_once '../../includes/classes/Conexao.php';
        require_once '../../includes/classes/Atividade_Aluno.php';

        session_start();
        $id = $_SESSION['id'];
        $atividades = new AtividadeAluno();
        $resultado = $atividades->AtividadesEmAndamento($id);

        while ($dados = $resultado->fetch_assoc()) :
            $data_inicio = new DateTime($dados['Inicio']);
        ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Atividade: <?php echo $dados['Descricao']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Status: <?php echo $dados['Status']; ?> </h6>
                    <h6 class="card-subtitle mb-2 text-muted">Tabuleiro: <?php echo $dados['Tabuleiro']; ?> </h6>
                    <p class="card-text">Iniciado em: <?php echo $data_inicio->format("d/m/Y H:i") ?></p>
                    <a href="?id=<?php echo $dados['ID']; ?>" class="card-link">Continuar</a>
                    <a href="./endwork.php?id=<?php echo $dados['ID']; ?>" class="card-link">Finalizar</a>
                </div>
            </div>
        <?php
        endwhile;
        ?>
    </main>
</body>

</html>