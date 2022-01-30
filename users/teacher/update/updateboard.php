<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/classes/Conexao.php';
$conexao = Conexao::Conectar();
$id = $conexao->escape_string($_GET['id']);
$sql = "SELECT * FROM tabuleiro WHERE idtabuleiro = '$id';";
$resultado = $conexao->query($sql);
$dados = $resultado->fetch_assoc();
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="../index.php">Home</a>
                    <a class="nav-link" href="../list/listwork.php">Gerenciar Atividades</a>
                    <a class="nav-link" href="../list/listworklevel.php">Gerenciar Nivel Das Atividades</a>
                    <a class="nav-link" href="../list/listworkcategory.php">Gerenciar Categoria Das Atividades</a>
                    <a class="nav-link active" aria-current="page" href="../list/listboard.php">Gerenciar Tabuleiros</a>
                    <a class="nav-link" href="../list/listbackgroundboard.php">Gerenciar Fundo Tabuleiro</a>
                    <a class="nav-link" href="../list/listimages.php">Gerenciar Imagens</a>
                    <a class="nav-link" href="../../../login/historicoacesso.php?opcao=Logout">Logout</a>
                </div>
            </div>
        </div>
    </nav>
</header>
<main>
    <div class="container">
        <h2>Atualizar Tabuleiro</h2>
        <form action="../../../actions/update.php" method="post">
            <input type="hidden" name="opcao" value="atualizarTabuleiro">
            <input type="hidden" name="id" value="<?php echo $dados['idtabuleiro']; ?>">
            <label class="form-label mt-1" for="planta">Planta do Tabuleiro: </label>
            <input class="form-control mb-1" type="text" name="planta" id="planta" value="<?php echo $dados['plantaTabuleiro']; ?>">
            <label class="form-label mt-1" for="descricao">Descrição: </label>
            <input class="form-control mb-1" type="text" name="descricao" id="descricao" value="<?php echo $dados['descricao']; ?>">
            <input class="btn btn-primary" type="submit" value="Atualizar">
            <br>
        </form>
    </div>
</main>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php';
?>