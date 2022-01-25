<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../styles/main.css">
    <title>Registrar Imagem de Fundo para Tabuleiro</title>
</head>

<body>
    <form action="../../../includes/create.php" method="post">
        <input type="hidden" name="opcao" value="criarFundoTabuleiro">
        <label for="url">URL: </label>
        <input type="text" name="url" id="url">
        <label for="tipo">Tipo: </label>
        <select name="tipo" id="tipo">
            <option>Selecione um tipo</option>
            <?php
            require_once '../../../includes/db_connection.php';
            $sql = "SELECT * FROM tipoimagem";
            $resultado = mysqli_query($connect, $sql);
            while ($dados = mysqli_fetch_assoc($resultado)) {
                echo "<option value='" . $dados['idtipoimagem'] . "'>" . $dados['tipoimagem'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>