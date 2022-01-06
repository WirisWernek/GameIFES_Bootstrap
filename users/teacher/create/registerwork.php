<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Atividade</title>
</head>
<body>
    <form action="../../../includes/create.php" method="post">
        <input type="hidden" name="opcao" value="criarAtividade">
        <label for="descricao">Descrição: </label>
        <input type="text" name="descricao" id="descricao">
        <label for="categoria">Categoria: </label>
        <select name="categoria">
            <option value="">Selecione um valor</option>
            <?php
                require_once '../../../includes/db_connection.php';
                $sql = "SELECT * FROM categoriaatividade";
                $resultado = mysqli_query($connect, $sql);
                while($dados = mysqli_fetch_assoc($resultado)){   
                    echo '<option value="' . $dados['idcategoriaAtividade'] . '">' . $dados['descricao'] . '</option>';
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
                while($dados = mysqli_fetch_assoc($resultado)){   
                    echo '<option value="' . $dados['idnivelAtividade'] . '">' . $dados['descricaoNivel'] . '</option>';
                }
            ?>
        </select>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>