<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/classes/Conexao.php';
session_start();
$conexao = Conexao::Conectar();
$id = intval($conexao->escape_string($_GET['id']));
$sql = "SELECT * FROM atividade WHERE idatividade = '$id';";
$resultado = $conexao->query($sql);
$dados = $resultado->fetch_assoc();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-success">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="./index.php">Home</a>
                <a class="nav-link active" href="./initnewwork.php">Nova Atividade</a>
                <a class="nav-link" href="./finishedwork.php">Atividades Finalizadas</a>
                <a class="nav-link" href="/login/historicoacesso.php?opcao=Logout">Logout</a>
            </div>
        </div>
    </div>
</nav>

<main>
    <div class="container">
        <form action="../../actions/create.php" method="post">
            <input type="hidden" name="opcao" value="iniciarAtividade">
            <input type="hidden" name="idAtividade" value="<?php echo $_GET['id']; ?>">
            <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['id']; ?>">
            <input type="hidden" name="descricao" value="<?php echo $dados['descricacao']; ?>">

            <h1>Selecione um Tabuleiro</h1>
            <select name="tabuleiro" class="form-select  form-select-md mb-1">
                <option value="">Selecione um valor</option>
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/classes/Conexao.php';
                $conexao = Conexao::Conectar();
                $sql = "SELECT * FROM tabuleiro";
                $resultado = $conexao->query($sql);
                while ($dados = $resultado->fetch_assoc()) {
                    echo '<option value="' . $dados['idtabuleiro'] . '">' . $dados['descricao'] . '</option>';
                }
                ?>
            </select>

            <input type="submit" class="btn btn-primary" value="Iniciar">
        </form>
    </div>
</main>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php';
?>