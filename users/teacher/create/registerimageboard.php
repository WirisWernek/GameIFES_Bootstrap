<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Imagem de Tabuleiro</title>
</head>
<body>
    <form action="../../../includes/create.php" method="post">
        <input type="hidden" name="opcao" value="criarImagemTabuleiro">
        <label for="url">URL: </label>
        <select name="url" id="url">
            <option>Selecione uma imagem</option>
    <?php
        require_once '../../../includes/db_connection.php';
        $sql = "SELECT * FROM imagenstabuleiro";
        $resultado = mysqli_query($connect, $sql);
        while($dados = mysqli_fetch_assoc($resultado)){
            echo "<option value='".$dados['idimagenstabuleiro']."'>".$dados['urlImagem']."</option>";
        }
    ?>
        </select>
        <label for="tabuleiro">Tabuleiro : </label>
        <select name="tabuleiro" id="tabuleiro">
            <option>Selecione um tabuleiro</option>
    <?php
        require_once '../../../includes/db_connection.php';
        $sql = "SELECT * FROM tabuleiro";
        $resultado = mysqli_query($connect, $sql);
        while($dados = mysqli_fetch_assoc($resultado)){
            echo "<option value='".$dados['idtabuleiro']."'>".$dados['descricao']."</option>";
        }
    ?>
        </select>
        <label for="posicao">Posição: </label>
        <input type="number" name="posicao" id="posicao">

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>