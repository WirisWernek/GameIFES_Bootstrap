<?php
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
        <h2>Novo Usuário</h2>
        <form action="../../../actions/create.php" method="post">
            <input type="hidden" name="opcao" value="criarUsuario">
            <label class="form-label mt-2" for="nome">Nome</label>
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome" required>
            <label class="form-label mt-2" for="login">Login</label>
            <input class="form-control" type="text" name="login" id="login" placeholder="Nome De Usuário" required>
            <label class="form-label mt-2" for="senha">Senha</label>
            <input class="form-control" type="password" name="senha" id="senha" placeholder="Senha" required>
            <label class="form-label mt-2" for="perfilusuario">Perfil do Usuário</label>
            <select name="perfilusuario" class="form-select form-select-md mb-1" id="perfilusuario">
                <option value="">Selecione um valor</option>
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/classes/Conexao.php';
                $conexao = Conexao::Conectar();
                $sql = "SELECT * FROM perfilusuario";
                $resultado = $conexao->query($sql);
                while ($dados = $resultado->fetch_assoc()) {
                    echo '<option value="' . $dados['idPerfilUsuario'] . '">' . $dados['descricao'] . '</option>';
                }
                ?>
                <input type="submit" class="btn btn-primary" value="Cadastrar">
        </form>
    </div>
</main>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php';
?>