<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../styles/main.css">
    <title>Gerenciar Categorias das Atividades</title>
</head>

<body>
    <main>
        <br><a href="../create/registerworkcategory.php">Cadastrar Nova Categoria</a>
        <?php
        include_once '../../../actions/list.php';
        listcategory();
        ?>
    </main>
</body>

</html>