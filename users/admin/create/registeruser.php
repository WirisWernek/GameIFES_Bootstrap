<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../styles/main.css">
    <link rel="stylesheet" href="./style.css">
    <title>Novo Usuário</title>
</head>

<body>
    <form action="../../../actions/create.php" method="post">
        <h2>Novo Usuário</h2>
        <input type="hidden" name="opcao" value="criarUsuario">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Nome" required><br>
        <label for="login">Login</label>
        <input type="text" name="login" id="login" placeholder="Nome De Usuário" required><br>
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" placeholder="Senha" required><br>
        <label for="perfilusuario">Perfil do Usuário</label>
        <select name="perfilusuario" id="perfilusuario">
            <option value="">Selecione um valor</option>
            <?php
            require_once '../../../includes/classes/Conexao.php';
            $conexao = Conexao::Conectar();
            $sql = "SELECT * FROM perfilusuario";
            $resultado = $conexao->query($sql);
            while ($dados = $resultado->fetch_assoc()) {
                echo '<option value="' . $dados['idPerfilUsuario'] . '">' . $dados['descricao'] . '</option>';
            }
            ?>
            <input type="submit" value="Cadastrar"><br><br>
    </form>
</body>

</html>