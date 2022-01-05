<?php
    function listcategory(){
        require_once '../../includes/db_connection.php';
        $sql = "SELECT * FROM categoriaatividade";
        $resultado = mysqli_query($connect, $sql);
        while($dados = mysqli_fetch_assoc($resultado)){   
            echo '<input type="hidden" name="id" value="' . $dados['idcategoriaAtividade'] . '">';
            echo '<label for="descricao">Descrição: </label>';
            echo '<input type="text" name="descricao" id="descricao" value="' . $dados['descricao'] . '" disabled>';
            echo '<a href="./updateworkcategory.php?id='. $dados['idcategoriaAtividade'] . '" >Editar</a>';
            echo '<a href="" >Excluir</a>';
            echo '<br>';
        } 
    }
    
    // echo "<br>listlevel";
    function listlevel(){
        require_once '../../includes/db_connection.php';
        $sql = "SELECT * FROM nivelatividade";
        $resultado = mysqli_query($connect, $sql);
        while($dados = mysqli_fetch_assoc($resultado)){   
            echo '<input type="hidden" name="id" value="' . $dados['idnivelAtividade'] . '">';
            echo '<label for="descricao">Descrição: </label>';
            echo '<input type="text" name="descricao" id="descricao" value="' . $dados['descricaoNivel'] . '" disabled>';
            echo '<a href="./updateworklevel.php?id='. $dados['idnivelAtividade'] . '" >Editar</a>';
            echo '<a href="" >Excluir</a>';
            echo '<br>';
        }
    }
?>