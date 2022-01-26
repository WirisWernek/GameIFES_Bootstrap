<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria de Atividade</title>
</head>

<body>
    <form action="../../../actions/update.php" method="post">
        <?php
        require_once '../../../includes/classes/Conexao.php';
        $conexao = Conexao::Conectar();
        $id = $conexao->escape_string($_GET['id']);
        $sql = "SELECT * FROM categoriaatividade WHERE idcategoriaAtividade = $id";
        $resultado = $conexao->query($sql);
        $dados = $resultado->fetch_assoc();
        echo '<input type="hidden" name="id" value="' . $dados['idcategoriaAtividade'] . '">';
        echo '<input type="hidden" name="opcao" value="atualizarCategoria">';
        echo '<label for="descricao">Descrição: </label>';
        echo '<input type="text" name="descricao" id="descricao" value="' . $dados['descricao'] . '">';
        echo '<input type="submit" value="Editar" >';

        ?>
    </form>
</body>

</html>