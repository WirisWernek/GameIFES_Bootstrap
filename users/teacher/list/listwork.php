<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../styles/main.css">
    <title>Gerenciar Atividades</title>
</head>
<body>
        <main>
            <br><a href='../create/registerwork.php'>Cadastrar Atividade</a>
            <?php
            require_once '../../../includes/list.php';
            listwork();
            ?>
        <main>

</body>
</html>