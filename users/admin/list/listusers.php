<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../styles/main.css">
    <title>Listar Usuários</title>
</head>

<body>
    <main>
        <br><a href="../create/registeruser.php">Cadastrar Novo Usuário</a>
        <div class="listusers">
            <?php
            require_once '../../../actions/list.php';
            listusers();
            ?>
        </div>
    </main>

</body>

</html>