<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../styles/main.css">
    <title>Gerenciar Imagens Tabuleiro</title>
</head>

<body>
    <br><a href="../create/registerimageboard.php">Cadastrar Nova Imagem de Fundo</a>
    <?php
    require_once '../../../actions/list.php';
    listimageboard();
    ?>
</body>

</html>