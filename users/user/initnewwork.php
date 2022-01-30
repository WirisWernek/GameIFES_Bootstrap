<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/classes/Conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/classes/Atividade_Aluno.php';

$novaatividade = new AtividadeAluno();
$resultado = $novaatividade->NovaAtividade();
$i = 0;
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="./index.php">Home</a>
                    <a class="nav-link active" aria-current="page" href="#">Nova Atividade</a>
                    <a class="nav-link" href="./finishedwork.php">Atividades Finalizadas</a>
                    <a class="nav-link" href="/login/historicoacesso.php?opcao=Logout">Logout</a>
                </div>
            </div>
        </div>
    </nav>
</header>
<main>
    <div class="container">
        <h1 class="text-center">Atividades</h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-center">
            <?php
            while ($dados = $resultado->fetch_assoc()) :
            ?>
                <div class="col m-1 card">
                    <div class="card-body">
                        <h5 class="card-title">Atividade <?php echo ($i + 1); ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Categoria: <?php echo $dados['Categoria']; ?> </h6>
                        <h6 class="card-subtitle mb-2 text-muted">Dificuldade: <?php echo $dados['Nivel']; ?> </h6>
                        <h6 class="card-text">Descrição: <?php echo $dados['Descricao']; ?></h6>
                        <a href="./accomplishwork.php?id=<?php echo $dados['IdAtividade']; ?>" class="btn btn-primary">Iniciar</a>
                    </div>
                </div>
            <?php
                $i++;
            endwhile;
            ?>
        </div>
    </div>
</main>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php';
?>