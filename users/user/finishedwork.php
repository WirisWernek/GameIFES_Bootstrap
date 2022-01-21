<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/main.css">
    <title>Atividades Finalizadas</title>
</head>
<body>
    <h1>Atividades Finalizadas</h1>
    <?php
        session_start();
        require_once '../../includes/classes/Atividade_Aluno.php';
        require_once '../../includes/classes/Conexao.php';

        $atividades = new AtividadeAluno();
        $resultado = $atividades->AtividadesFinalizadas();
        while($dados =$resultado->fetch_assoc()):
            $data_inicio = new DateTime($dados['Inicio']);
            $data_fim = new DateTime($dados['Fim']);
    ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Atividade: <?php echo $dados['Descricao']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Status: <?php echo $dados['Status']; ?> </h6>
                    <h6 class="card-subtitle mb-2 text-muted">Tabuleiro: <?php echo $dados['Tabuleiro']; ?> </h6>
                    <p class="card-text">Iniciado em: <?php echo $data_inicio->format("d/m/Y H:i") ?></p>
                    <p class="card-text">Finalizado em: <?php echo $data_fim->format("d/m/Y H:i") ?></p>
                </div>
            </div>
    <?php
        endwhile;
    ?>
</body>
</html>