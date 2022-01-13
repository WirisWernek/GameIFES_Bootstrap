<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/main.css">
    <title>Nova Atividade</title>
</head>
<body>
    <h1>Atividades</h1>
    <?php
        require_once '../../includes/db_connection.php';
        $sql = "call atividade();";
        $resultado = mysqli_query($connect, $sql);
        $i = 0;
        while($dados = mysqli_fetch_assoc($resultado)):
    ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Atividade <?php echo ($i+1); ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Categoria: <?php echo $dados['Categoria']; ?> </h6>
                <h6 class="card-subtitle mb-2 text-muted">Dificuldade: <?php echo $dados['Nivel']; ?> </h6>
                <p class="card-text">Descrição: <?php echo $dados['Descricao']; ?></p>
                <a href="./accomplishwork.php?id=<?php echo $dados['IdAtividade']; ?>" class="card-link">Iniciar</a>
            </div>
        </div>
    <?php
        $i++;
        endwhile;
    ?>
</body>
</html>