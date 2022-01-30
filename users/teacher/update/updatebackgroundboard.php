<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/includes/classes/Conexao.php';
$conexao = Conexao::Conectar();
$id = $conexao->escape_string($_GET['id']);
$sql = "SELECT * FROM tabuleiro_imagenstabuleiro WHERE idtabuleiro_imagenstabuleiro = $id;";
$resultado = $conexao->query($sql);
$data = $resultado->fetch_assoc();
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
                    <a class="nav-link" href="../list/listboard.php">Gerenciar Tabuleiros</a>
                    <a class="nav-link active" aria-current="page" href="../list/listbackgroundboard.php">Gerenciar Fundo Tabuleiro</a>
                    <a class="nav-link" href="../list/listimages.php">Gerenciar Imagens</a>
                    <a class="nav-link" href="../../../login/historicoacesso.php?opcao=Logout">Logout</a>
                </div>
            </div>
        </div>
    </nav>
</header>
<main>
    <div class="container">
        <h2>Atualizar Fundo de Tabuleiro</h2>
        <form action="../../../actions/update.php" method="post">
            <input type="hidden" name="opcao" value="atualizarFundoTabuleiro">
            <input type="hidden" name="id" value="<?php echo $data['idtabuleiro_imagenstabuleiro']; ?>">
            <label class="form-label mt-1" for="imagem">Imagem: </label>
            <select name="imagem" class="form-select form-select-md mb-1">
                <option>Selecione uma imagem</option>
                <?php
                require_once '../../../includes/classes/Conexao.php';
                $conexao = Conexao::Conectar();
                $sql = "SELECT * FROM imagenstabuleiro";
                $resultado = $conexao->query($sql);
                while ($dados = $resultado->fetch_assoc()) {
                    if ($dados['idimagenstabuleiro'] == $data['imagenstabuleiroID']) {
                        echo '<option value="' . $dados['idimagenstabuleiro'] . '" selected ="selected">' . $dados['urlImagem'] . '</option>';
                    } else {
                        echo '<option value="' . $dados['idimagenstabuleiro'] . '">' . $dados['urlImagem'] . '</option>';
                    }
                }
                ?>
            </select>
            <label class="form-label mt-1" for="tabuleiro">Tabuleiro : </label>
            <select name="tabuleiro" class="form-select form-select-md mb-1">
                <option>Selecione um tabuleiro</option>
                <?php
                require_once '../../../includes/classes/Conexao.php';
                $conexao = Conexao::Conectar();
                $sql = "SELECT * FROM tabuleiro";
                $resultado = $conexao->query($sql);
                while ($dados = $resultado->fetch_assoc()) {
                    if ($dados['idtabuleiro'] == $data['tabuleiroID']) {
                        echo '<option value="' . $dados['idtabuleiro'] . '" selected ="selected">' . $dados['descricao'] . '</option>';
                    } else {
                        echo '<option value="' . $dados['idtabuleiro'] . '">' . $dados['descricao'] . '</option>';
                    }
                }
                ?>
            </select>
            <label class="form-label mt-1" for="posicao">Posição: </label>
            <input class="form-control mb-1" type="number" name="posicao" id="posicao" value="<?php echo $data['posicaoTabuleiro']; ?>">
            <input class="btn btn-primary" type="submit" value="Atualizar">
            <br>
        </form>
    </div>
</main>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php';
?>