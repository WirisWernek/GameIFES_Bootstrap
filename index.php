<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>
<main>
    <div class="container-sm">
        <div>
            <fieldset>
                <form action="./login/login.php" method="post">
                    <h2>Login</h2>
                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" name="login" class="form-control" id="login" placeholder="Nome de Usuário" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha" required>
                    </div>
                    <input type="submit" name="btn-login" class="btn btn-primary mt-3" value="Entrar">
                </form>
            </fieldset>
        </div>
    </div>
</main>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php';
?>