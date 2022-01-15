<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../styles/main.css">
    <title>Registrar Categoria Atividade</title>
</head>
<body>
    <form action="../../../includes/create.php" method="post">
        <input type="hidden" name="opcao" value="criarCategoria">
        <label for="descricao">Descrição: </label>
        <input type="text" name="descricao" id="descricao">
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>