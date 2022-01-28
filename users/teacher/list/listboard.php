<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../styles/main.css">
    <title>Gerenciar Tabuleiros</title>
</head>

<body>
    <main>
        <br><a href="../create/registerboard.php">Cadastrar Novo Tabuleiro</a>
        <?php
        require_once '../../../actions/list.php';
        listboard();
        ?>
    </main>
</body>

</html>