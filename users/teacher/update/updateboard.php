<?php
require_once '../../../includes/classes/Conexao.php';
$conexao = Conexao::Conectar();
$id = $conexao->escape_string($_GET['id']);
$sql = "SELECT * FROM tabuleiro WHERE idtabuleiro = '$id';";
$resultado = $conexao->query($sql);
$dados = $resultado->fetch_assoc();
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
    <form action="../../../actions/update.php" method="post">
        <input type="hidden" name="opcao" value="atualizarTabuleiro">
        <input type="hidden" name="id" value="<?php echo $dados['idtabuleiro']; ?>">
        <label for="planta">Planta do Tabuleiro: </label>
        <input type="text" name="planta" id="planta" value="<?php echo $dados['plantaTabuleiro']; ?>">

        <label for="descricao">Descrição: </label>
        <input type="text" name="descricao" id="descricao" value="<?php echo $dados['descricao']; ?>">
        <input type="submit" value="Atualizar">
        <br>
    </form>
</body>

</html>