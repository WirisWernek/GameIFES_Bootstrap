<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nível de Atividade</title>
</head>

<body>
    <form action="../../../actions/update.php" method="post">
        <?php
        require_once '../../../includes/classes/Conexao.php';
        $conexao = Conexao::Conectar();
        $id = $conexao->escape_string($_GET['id']);
        $sql = "SELECT * FROM nivelatividade WHERE idnivelAtividade = '$id'";
        $resultado = $conexao->query($sql);
        $dados = $resultado->fetch_assoc();

        echo '<input type="hidden" name="id" value="' . $dados['idnivelAtividade'] . '">';
        echo '<input type="hidden" name="opcao" value="atualizarNivel">';
        echo '<label for="descricao">Descrição: </label>';
        echo '<input type="text" name="descricao" id="descricao" value="' . $dados['descricaoNivel'] . '">';
        echo '<input type="submit" value="Editar" >';
        ?>
    </form>
</body>

</html>