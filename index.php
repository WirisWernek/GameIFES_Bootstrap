<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameIfes - Entrar</title>
</head>

<body>
    <!-- <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="cadastro.html">Cadastro</a></li>
                <li><a href="login.html">Login</a></li>
            </ul>'
        </nav>
    </header> -->
    <main>
        <div>
            <div>
                <fieldset>
                    <!-- TODO: Mover criação de usuário para função de adimim -->
                    <form action="./login/createuser.php" method="post">
                        <h2>Novo Usuário</h2>
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Nome" required ><br>
                        <label for="login">Login</label>
                        <input type="text" name="login" id="login" placeholder="Nome De Usuário" required ><br>
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" placeholder="Senha" required ><br>
                        <input type="submit" value="Cadastrar" name="btn-cadastrar"><br><br>
                    </form>
                </fieldset>
            </div>
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
        </div>
        
    </main>
    
</body>

</html>

<?php
session_start();
echo $_SESSION['mensagem'];
?>