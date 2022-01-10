<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameIfes</title>
</head>

<body>
    <main>
        <div>
            <fieldset>
                <form action="./login/login.php" method="post">
                    <h2>Login</h2>
                    <label for="login">Login</label>
                    <input type="text" name="login" id="login" placeholder="Nome de Usuário" required ><br>
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Senha" required ><br>
                    <input type="submit" value="Entrar" name="btn-login"><br><br>
                </form>
            </fieldset>
        </div>
    </main>
    
</body>

</html>

<?php
session_start();
echo $_SESSION['mensagem'];
?>