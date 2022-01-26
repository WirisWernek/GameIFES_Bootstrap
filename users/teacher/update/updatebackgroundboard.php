<?php
require_once '../../../includes/classes/Conexao.php';
$conexao = Conexao::Conectar();
$id = $conexao->escape_string($_GET['id']);
$sql = "SELECT * FROM imagenstabuleiro WHERE idimagenstabuleiro = $id;";
$consulta = $conexao->query($sql);
$data = $consulta->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Imagem de Fundo</title>
</head>

<body>
    <form action="../../../actions/update.php" method="post">
        <input type="hidden" name="opcao" value="atualizarFundoTabuleiro">
        <input type="hidden" name="id" value="<?php echo $data['idimagenstabuleiro']; ?>">
        <label for="url">URL: </label>
        <input type="text" name="url" id="url" value="<?php echo $data['urlImagem']; ?>">
        <label for="tipo">Tipo de Imagem: </label>
        <select name="tipo">
            <option value="">Selecione um valor</option>
            <?php
            require_once '../../../includes/classes/Conexao.php';
            $conexao = Conexao::Conectar();
            $sql = "SELECT * FROM tipoimagem";
            $resultado = $conexao->query($sql);
            while ($dados = $resultado->fetch_assoc()) {
                if ($dados['idtipoimagem'] == $data['tipoimagemid']) {
                    echo '<option value="' . $dados['idtipoimagem'] . '" selected ="selected">' . $dados['tipoimagem'] . '</option>';
                } else {
                    echo '<option value="' . $dados['idtipoimagem'] . '">' . $dados['tipoimagem'] . '</option>';
                }
            }
            ?>
        </select>
        <input type="submit" value="Atualizar">
        <br>
    </form>
</body>

</html>