<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../../../styles/main.css">
    <title>Listar Usuários</title>
</head>

<body>
    <main>
        <br><a id="cad" href="../create/registeruser.php">Cadastrar Novo Usuário</a>
        <?php
        require_once '../../../actions/list.php';
        listusers();
        ?>
    </main>

</body>

</html>