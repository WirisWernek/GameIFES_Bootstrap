<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/classes/Conexao.php';
$conexao = Conexao::Conectar();
$id = $conexao->escape_string($_GET['id']);
$consulta = "SELECT * FROM usuario where idusuario = '$id'";
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
                    <a class="nav-link" href="/login/historicoacesso.php?opcao=Logout">Logout</a>
                </div>
            </div>
        </div>
    </nav>
</header>
<main>
    <div class="container">
        <h2>Atualizar Usuário</h2>
        <form action="../../../actions/update.php" method="post">
            <input type="hidden" name="opcao" value="atualizarAtividade">
            <input type="hidden" name="id" value="<?php echo $id ?>">

            <input type="hidden" name="opcao" value="atualizarUsuario">
            <label class="form-label mt-2" for="nome">Nome</label>
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome" value="<?php echo $data['nomeCompletoUsuario'] ?>"><br>
            <label class="form-label mt-2" for="login">Login</label>
            <input class="form-control" type="text" name="login" id="login" placeholder="Nome De Usuário" value="<?php echo $data['login'] ?>"><br>
            <label class="form-label mt-2" for="perfilusuario">Perfil do Usuário</label>
            <select name="perfilusuario" class="form-select form-select-md mb-1" id="perfilusuario">
                <option value="">Selecione um valor</option>
                <?php
                require_once '../../../includes/classes/Conexao.php';
                $conexao = Conexao::Conectar();
                $sql = "SELECT * FROM perfilusuario";
                $resultado = $conexao->query($sql);
                while ($dados = $resultado->fetch_assoc()) {
                    if ($dados['idPerfilUsuario'] == $data['perfilUsuarioID']) {
                        echo '<option value="' . $dados['idPerfilUsuario'] . '" selected ="selected">' . $dados['descricao'] . '</option>';
                    } else {
                        echo '<option value="' . $dados['idPerfilUsuario'] . '">' . $dados['descricao'] . '</option>';
                    }
                }
                ?>
                <input type="submit" class="btn btn-primary" value="Atualizar">
        </form>
    </div>
</main>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php';
?>