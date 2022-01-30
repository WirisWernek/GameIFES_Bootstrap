<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/classes/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/classes/Atividade_Aluno.php';
$id = $_SESSION['id'];
$atividades = new AtividadeAluno();
$resultado = $atividades->AtividadesFinalizadas($id);
?>
<nav class="navbar navbar-expand-lg navbar-light bg-success">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="./index.php">Home</a>
                <a class="nav-link" href="./initnewwork.php">Nova Atividade</a>
                <a class="nav-link active" aria-current="page" href="#">Atividades Finalizadas</a>
                <a class="nav-link" href="/login/historicoacesso.php?opcao=Logout">Logout</a>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <h1 class="text-center">Atividades Finalizadas</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-center">
        <?php
        while ($dados = $resultado->fetch_assoc()) :
            $data_inicio = new DateTime($dados['Inicio']);
            $data_fim = new DateTime($dados['Fim']);
        ?>
            <div class="col m-1 card">
                <div class="card-body">
                    <h5 class="card-title">Atividade: <?php echo $dados['Descricao']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Status: <?php echo $dados['Status']; ?> </h6>
                    <h6 class="card-subtitle mb-2 text-muted">Tabuleiro: <?php echo $dados['Tabuleiro']; ?> </h6>
                    <h6 class="card-text">Iniciado em: <?php echo $data_inicio->format("d/m/Y H:i") ?></h6>
                    <h6 class="card-text">Finalizado em: <?php echo $data_fim->format("d/m/Y H:i") ?></h6>
                </div>
            </div>
        <?php
        endwhile;
        ?>
    </div>
</div>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php';
?>