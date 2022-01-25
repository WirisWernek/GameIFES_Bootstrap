<?php
require_once '../../../includes/db_connection.php';
$id = $_GET['id'];
$consulta = "SELECT * FROM usuario where idusuario = '$id'";
$query = mysqli_query($connect, $consulta);
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <label for="senha">Senha</label>
        <input type="text" name="senha" id="senha" placeholder="Senha" value="<?php echo $data['senha'] ?>"><br>
        <label for="perfilusuario">Perfil do Usuário</label>
        <select name="perfilusuario" id="perfilusuario">
            <option value="">Selecione um valor</option>
            <?php
            require_once '../../../includes/db_connection.php';
            $sql = "SELECT * FROM perfilusuario";
            $resultado = mysqli_query($connect, $sql);
            while ($dados = mysqli_fetch_assoc($resultado)) {
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