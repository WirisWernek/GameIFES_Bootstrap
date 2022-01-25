<?php
require_once '../../../includes/db_connection.php';
$id = $_GET['id'];
$consulta = "SELECT * FROM atividade where idatividade = '$id'";
$query = mysqli_query($connect, $consulta);
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Atividade</title>
</head>

<body>
    <form action="../../../includes/update.php" method="post">
        <input type="hidden" name="opcao" value="atualizarAtividade">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <label for="descricao">Descrição: </label>
        <input type="text" name="descricao" id="descricao" value="<?php echo $data['descricacao'] ?>">
        <label for="categoria">Categoria: </label>
        <select name="categoria">
            <option value="">Selecione um valor</option>
            <?php
            require_once '../../../includes/db_connection.php';
            $sql = "SELECT * FROM categoriaatividade";
            $resultado = mysqli_query($connect, $sql);
            while ($dados = mysqli_fetch_assoc($resultado)) {
                if ($dados['idcategoriaAtividade'] == $data['categoriaatividadeid']) {
                    echo '<option value="' . $dados['idcategoriaAtividade'] . '" selected ="selected">' . $dados['descricao'] . '</option>';
                } else {
                    echo '<option value="' . $dados['idcategoriaAtividade'] . '">' . $dados['descricao'] . '</option>';
                }
            }
            ?>
        </select>
        <label for="nivel">Nível: </label>
        <select name="nivel">
            <option value="">Selecione um valor</option>
            <?php
            require_once '../../../includes/db_connection.php';
            $sql = "SELECT * FROM nivelatividade";
            $resultado = mysqli_query($connect, $sql);
            while ($dados = mysqli_fetch_assoc($resultado)) {
                if ($dados['idnivelAtividade'] == $data['nivelatividadeid']) {
                    echo '<option value="' . $dados['idnivelAtividade'] . '" selected ="selected">' . $dados['descricaoNivel'] . '</option>';
                } else {
                    echo '<option value="' . $dados['idnivelAtividade'] . '">' . $dados['descricaoNivel'] . '</option>';
                }
            }
            ?>
        </select>
        <input type="submit" value="Atualizar">
    </form>
</body>

</html>