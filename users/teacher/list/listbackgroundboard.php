<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../styles/main.css">
    <title>Gerenciar Fundos de Tabuleiro</title>
</head>
<body>
    <br><a href="../create/registerbackgroundboard.php">Cadastrar Nova Imagem de Fundo</a>
        <?php
        require_once '../../../includes/list.php';
        listbackgroundboard();
        ?>
</body>
</html>