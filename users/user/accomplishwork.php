<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/main.css">
    <title>Realizar Atividade</title>
</head>

<body>
    <?php
    session_start();
    require_once '../../includes/classes/Conexao.php';
    $conexao = Conexao::Conectar();
    $id = intval($conexao->escape_string($_GET['id']));
    $sql = "SELECT * FROM atividade WHERE idatividade = '$id';";
    $resultado = $conexao->query($sql);
    $dados = $resultado->fetch_assoc();
    ?>
    <form action="../../actions/create.php" method="post">
        <input type="hidden" name="opcao" value="iniciarAtividade">
        <input type="hidden" name="idAtividade" value="<?php echo $_GET['id']; ?>">
        <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['id']; ?>">
        <input type="hidden" name="descricao" value="<?php echo $dados['descricacao']; ?>">

        <label for="tabuleiro">Tabuleiro</label>
        <select name="tabuleiro">
            <option value="">Selecione um valor</option>
            <?php
            require_once '../../includes/classes/Conexao.php';
            $conexao = Conexao::Conectar();
            $sql = "SELECT * FROM tabuleiro";
            $resultado = $conexao->query($sql);
            while ($dados = $resultado->fetch_assoc()) {
                echo '<option value="' . $dados['idtabuleiro'] . '">' . $dados['descricao'] . '</option>';
            }
            ?>
        </select>

        <input type="submit" value="Iniciar">
    </form>

</body>

</html>