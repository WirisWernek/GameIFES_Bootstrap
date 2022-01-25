<?php
require_once '../../../includes/db_connection.php';
$id = mysqli_escape_string($connect, $_GET['id']);
$sql = "SELECT * FROM tabuleiro WHERE idtabuleiro = $id;";
$resultado = mysqli_fetch_assoc(mysqli_query($connect, $sql));
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tabuleiro</title>
</head>

<body>
    <form action="../../../includes/update.php" method="post">
        <input type="hidden" name="opcao" value="atualizarTabuleiro">
        <input type="hidden" name="id" value="<?php echo $resultado['idtabuleiro']; ?>">
        <label for="planta">Planta do Tabuleiro: </label>
        <input type="text" name="planta" id="planta" value="<?php echo $resultado['plantaTabuleiro']; ?>">

        <label for="descricao">Descrição: </label>
        <input type="text" name="descricao" id="descricao" value="<?php echo $resultado['descricao']; ?>">
        <input type="submit" value="Atualizar">
        <br>
    </form>
</body>

</html>