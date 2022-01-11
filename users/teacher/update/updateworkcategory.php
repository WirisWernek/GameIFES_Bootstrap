<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria de Atividade</title>
</head>
<body>
    <form action="../../../includes/update.php" method="post">
        <?php
        require_once '../../../includes/db_connection.php';
        $id = $_GET['id'];
        $sql = "SELECT * FROM categoriaatividade WHERE idcategoriaAtividade = $id";
        $resultado = mysqli_query($connect, $sql);
        $dados = mysqli_fetch_assoc($resultado);
        echo '<input type="hidden" name="id" value="' . $dados['idcategoriaAtividade'] . '">';
        echo '<input type="hidden" name="opcao" value="atualizarCategoria">';
        echo '<label for="descricao">Descrição: </label>';
        echo '<input type="text" name="descricao" id="descricao" value="' . $dados['descricao'] . '">';
        echo '<input type="submit" value="Editar" >';
        
        ?>
    </form>
</body>
</html>