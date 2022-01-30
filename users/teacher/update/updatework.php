<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/classes/Conexao.php';
$conexao = Conexao::Conectar();
$id = $conexao->escape_string($_GET['id']);
$consulta = "SELECT * FROM atividade where idatividade = '$id'";
$query = $conexao->query($consulta);
$data = $query->fetch_assoc();
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
                    <a class="nav-link active" aria-current="page" href="../list/listwork.php">Gerenciar Atividades</a>
                    <a class="nav-link" href="../list/listworklevel.php">Gerenciar Nivel Das Atividades</a>
                    <a class="nav-link" href="../list/listworkcategory.php">Gerenciar Categoria Das Atividades</a>
                    <a class="nav-link" href="../list/listboard.php">Gerenciar Tabuleiros</a>
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
        <h2>Atualizar Atividade</h2>
        <form action="../../../actions/update.php" method="post">
            <input type="hidden" name="opcao" value="atualizarAtividade">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <label class="form-label mt-2" for="descricao">Descrição: </label>
            <input class="form-control" type="text" name="descricao" id="descricao" value="<?php echo $data['descricacao'] ?>">
            <label class="form-label mt-2" for="categoria">Categoria: </label>
            <select name="categoria" class="form-select form-select-md mb-1">
                <option value="">Selecione um valor</option>
                <?php
                require_once '../../../includes/classes/Conexao.php';
                $conexao = Conexao::Conectar();
                $sql = "SELECT * FROM categoriaatividade";
                $resultado = $conexao->query($sql);

                while ($dados = $resultado->fetch_assoc()) {
                    if ($dados['idcategoriaAtividade'] == $data['categoriaatividadeid']) {
                        echo '<option value="' . $dados['idcategoriaAtividade'] . '" selected ="selected">' . $dados['descricao'] . '</option>';
                    } else {
                        echo '<option value="' . $dados['idcategoriaAtividade'] . '">' . $dados['descricao'] . '</option>';
                    }
                }
                ?>
            </select>
            <label class="form-label mt-2" for="nivel">Nível: </label>
            <select name="nivel" class="form-select form-select-md mb-1">
                <option value="">Selecione um valor</option>
                <?php
                require_once '../../../includes/classes/Conexao.php';
                $conexao = Conexao::Conectar();
                $sql = "SELECT * FROM nivelatividade";
                $resultado = $conexao->query($sql);

                while ($dados = $resultado->fetch_assoc()) {
                    if ($dados['idnivelAtividade'] == $data['nivelatividadeid']) {
                        echo '<option value="' . $dados['idnivelAtividade'] . '" selected ="selected">' . $dados['descricaoNivel'] . '</option>';
                    } else {
                        echo '<option value="' . $dados['idnivelAtividade'] . '">' . $dados['descricaoNivel'] . '</option>';
                    }
                }
                ?>
            </select>
            <input class="btn btn-primary" type="submit" value="Atualizar">
        </form>
    </div>
</main>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php';
?>