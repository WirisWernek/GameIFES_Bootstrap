<?php
    function listcategory(){
        require_once '../../../includes/db_connection.php';
        $sql = "SELECT * FROM categoriaatividade";
        $resultado = mysqli_query($connect, $sql);
        while($dados = mysqli_fetch_assoc($resultado)){   
            echo '<form action="../../../includes/delete.php" method="post">';
            echo '<input type="hidden" name="opcao" value="deletarCategoria">';
            echo '<input type="hidden" name="id" value="' . $dados['idcategoriaAtividade'] . '">';
            echo '<label for="descricao">Descrição: </label>';
            echo '<input type="text" name="descricao" id="descricao" value="' . $dados['descricao'] . '" disabled>';
            echo '<a href="../update/updateworkcategory.php?id='. $dados['idcategoriaAtividade'] . '" >Editar</a>';
            echo '<button type="submit" >Excuir</button>';
            echo '<br>';
            echo '</form>';
        } 
    }
    
    function listlevel(){
        require_once '../../../includes/db_connection.php';
        $sql = "SELECT * FROM nivelatividade";
        $resultado = mysqli_query($connect, $sql);
        while($dados = mysqli_fetch_assoc($resultado)){   
            echo '<form action="../../../includes/delete.php" method="post">';
            echo '<input type="hidden" name="opcao" value="deletarNivel">';
            echo '<input type="hidden" name="id" value="' . $dados['idnivelAtividade'] . '">';
            echo '<label for="descricao">Descrição: </label>';
            echo '<input type="text" name="descricao" id="descricao" value="' . $dados['descricaoNivel'] . '" disabled>';
            echo '<a href="../update/updateworklevel.php?id='. $dados['idnivelAtividade'] . '" >Editar</a>';
            echo '<button type="submit" >Excuir</button>';
            echo '<br>';
            echo '</form>';
        }
    }
?>
