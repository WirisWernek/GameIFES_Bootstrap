<?php
require_once '../../../includes/classes/Conexao.php';
$conexao = Conexao::Conectar();
$id = $conexao->escape_string($_GET['id']);
$sql = "SELECT * FROM tabuleiro_imagenstabuleiro WHERE idtabuleiro_imagenstabuleiro = $id;";
$resultado = $conexao->query($sql);
$data = $resultado->fetch_assoc();
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
        <input type="hidden" name="opcao" value="atualizarImagemTabuleiro">
        <input type="hidden" name="id" value="<?php echo $data['idtabuleiro_imagenstabuleiro']; ?>">
        <label for="imagem">Imagem: </label>
        <select name="imagem">
            <option>Selecione uma imagem</option>
            <?php
            require_once '../../../includes/classes/Conexao.php';
            $conexao = Conexao::Conectar();
            $sql = "SELECT * FROM imagenstabuleiro";
            $resultado = $conexao->query($sql);
            while ($dados = $resultado->fetch_assoc()) {
                if ($dados['idimagenstabuleiro'] == $data['imagenstabuleiroID']) {
                    echo '<option value="' . $dados['idimagenstabuleiro'] . '" selected ="selected">' . $dados['urlImagem'] . '</option>';
                } else {
                    echo '<option value="' . $dados['idimagenstabuleiro'] . '">' . $dados['urlImagem'] . '</option>';
                }
            }
            ?>
        </select>
        <label for="tabuleiro">Tabuleiro : </label>
        <select name="tabuleiro">
            <option>Selecione um tabuleiro</option>
            <?php
            require_once '../../../includes/classes/Conexao.php';
            $conexao = Conexao::Conectar();
            $sql = "SELECT * FROM tabuleiro";
            $resultado = $conexao->query($sql);
            while ($dados = $resultado->fetch_assoc()) {
                if ($dados['idtabuleiro'] == $data['tabuleiroID']) {
                    echo '<option value="' . $dados['idtabuleiro'] . '" selected ="selected">' . $dados['descricao'] . '</option>';
                } else {
                    echo '<option value="' . $dados['idtabuleiro'] . '">' . $dados['descricao'] . '</option>';
                }
            }
            ?>
        </select>
        <label for="posicao">Posição: </label>
        <input type="number" name="posicao" id="posicao" value="<?php echo $data['posicaoTabuleiro']; ?>">
        <input type="submit" value="Atualizar">
        <br>
    </form>
</body>

</html>