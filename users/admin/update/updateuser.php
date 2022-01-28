<?php
require_once '../../../includes/classes/Conexao.php';
$conexao = Conexao::Conectar();
$id = $conexao->escape_string($_GET['id']);
$consulta = "SELECT * FROM usuario where idusuario = '$id'";
$query = $conexao->query($consulta);
$data = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../../../styles/main.css">
    <title>Editar Atividade</title>
</head>

<body>
    <form action="../../../actions/update.php" method="post">
        <input type="hidden" name="opcao" value="atualizarAtividade">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <h2>Novo Usuário</h2>
        <input type="hidden" name="opcao" value="atualizarUsuario">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Nome" value="<?php echo $data['nomeCompletoUsuario'] ?>"><br>
        <label for="login">Login</label>
        <input type="text" name="login" id="login" placeholder="Nome De Usuário" value="<?php echo $data['login'] ?>"><br>
        <label for="perfilusuario">Perfil do Usuário</label>
        <select name="perfilusuario" id="perfilusuario">
            <option value="">Selecione um valor</option>
            <?php
            require_once '../../../includes/classes/Conexao.php';
            $conexao = Conexao::Conectar();
            $sql = "SELECT * FROM perfilusuario";
            $resultado = $conexao->query($sql);
            while ($dados = $resultado->fetch_assoc()) {
                if ($dados['idPerfilUsuario'] == $data['perfilUsuarioID']) {
                    echo '<option value="' . $dados['idPerfilUsuario'] . '" selected ="selected">' . $dados['descricao'] . '</option>';
                } else {
                    echo '<option value="' . $dados['idPerfilUsuario'] . '">' . $dados['descricao'] . '</option>';
                }
            }
            ?>
            <input type="submit" value="Atualizar">
    </form>
</body>

</html>