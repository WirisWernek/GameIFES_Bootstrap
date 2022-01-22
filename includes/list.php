<?php
    function listcategory(){
        include_once '../../../includes/classes/Conexao.php';
        include_once '../../../includes/classes/Categoria_Atividade.php';
        $categoria = new CategoriaAtividade();
        $categoria->Read();
    }
    
    function listlevel(){
        include_once '../../../includes/classes/Conexao.php';
        include_once '../../../includes/classes/Nivel_Atividade.php';
        $categoria = new NivelAtividade();
        $categoria->Read();
    }

    function listwork(){
        require_once '../../../includes/db_connection.php';
        $sql = "call atividade();";
        $resultado = mysqli_query($connect, $sql);
        while($dados = mysqli_fetch_assoc($resultado)){   
            echo '<form action="../../../includes/delete.php" method="post">';
            echo '<input type="hidden" name="opcao" value="deletarAtividade">';
            echo '<input type="hidden" name="id" value="' . $dados['IdAtividade'] . '">';
            echo '<label for="descricao">Descrição: </label>';
            echo '<input type="text" name="descricao" id="descricao" value="' . $dados['Descricao'] . '" disabled>';
            echo '<label for="categoria">Categoria: </label>';
            echo '<input type="text" name="categoria" id="categoria" value="' . $dados['Categoria'] . '" disabled>';
            echo '<label for="nivel">Nível: </label>';
            echo '<input type="text" name="nivel" id="nivel" value="' . $dados['Nivel'] . '" disabled>';
            echo '<a href="../update/updatework.php?id='. $dados['IdAtividade'] . '" >Editar</a>';
            echo '<button type="submit" >Excluir</button>';
            echo '<br>';
            echo '</form>';
        }
    }

    function listusers(){
        require_once '../../../includes/db_connection.php';
        $sql = "SELECT * FROM usuario";
        $resultado = mysqli_query($connect, $sql);
        echo '<table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Data de Cadastro</th>
                    <th>Nível</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>'; 
            while($dados = mysqli_fetch_assoc($resultado)){   
                $data = new DateTime($dados['dataCadastro']);
                echo '<tr>';
                echo '<form action="../../../includes/delete.php" method="post">';
                echo '<input type="hidden" name="opcao" value="deletarUsuario">';
                echo '<input type="hidden" name="id" value="' . $dados['idusuario'] . '">';
                echo '<td>' . $dados['idusuario'] . '</td>';
                echo '<td>' . $dados['nomeCompletoUsuario'] . '</td>';
                echo '<td>' . $dados['login'] . '</td>';
                echo "<td>" . $data->format('d/m/Y') . "</td>";
                echo '<td>' . $dados['perfilUsuarioID'] . '</td>';
                echo '<td><a href="../update/updateuser.php?id='. $dados['idusuario'] . '" >Editar</a>';
                echo '<td><button type="submit" >Excluir</button>';
                echo '</form>';
                echo '</tr>';
            }
            echo '</tbody>
        </table>';
        
    }

    function listboard(){
        require_once '../../../includes/db_connection.php';
        $sql = "SELECT * FROM tabuleiro";
        $resultado = mysqli_query($connect, $sql);
        while($dados = mysqli_fetch_assoc($resultado)){
            $data = new DateTime($dados['dataCriacao']);  
            echo '<form action="../../../includes/delete.php" method="post">';
            echo '<input type="hidden" name="opcao" value="deletarTabuleiro">';
            echo '<input type="hidden" name="id" value="' . $dados['idtabuleiro'] . '">';
            echo '<label for="planta">Planta do Tabuleiro: </label>';
            echo '<input type="text" name="planta" id="planta" value="' . $dados['plantaTabuleiro'] . '" disabled>';
            echo '<label for="descricao">Descrição: </label>';
            echo '<input type="text" name="descricao" id="descricao" value="' . $dados['descricao'] . '" disabled>';
            echo '<label for="data">Data de Criação: </label>';
            echo '<input type="text" name="data" id="data" value="' . $data->format('d/m/Y') . '" disabled>';
            echo '<a href="../update/updateboard.php?id='. $dados['idtabuleiro'] . '" >Editar</a>';
            echo '<button type="submit" >Excluir</button>';
            echo '<br>';
            echo '</form>';
        }
    }

    function listbackgroundboard(){
        require_once '../../../includes/db_connection.php';
        $sql = "call imagensTabuleiro();";
        $resultado = mysqli_query($connect, $sql);
        while($dados = mysqli_fetch_assoc($resultado)){  
            echo '<form action="../../../includes/delete.php" method="post">';
            echo '<input type="hidden" name="opcao" value="deletarFundoTabuleiro">';
            echo '<input type="hidden" name="id" value="' . $dados['ID'] . '">';
            echo '<label for="url">URL: </label>';
            echo '<input type="text" name="url" id="url" value="' . $dados['URL'] . '" disabled>';
            echo '<label for="tipo">Tipo de Imagem: </label>';
            echo '<input type="text" name="tipo" id="tipo" value="' . $dados['Tipo'] . '" disabled>';
            echo '<a href="../update/updatebackgroundboard.php?id='. $dados['ID'] . '" >Editar</a>';
            echo '<button type="submit" >Excluir</button>';
            echo '<br>';
            echo '</form>';
        }
    }
    function  listimageboard(){
        require_once '../../../includes/db_connection.php';
        $sql = "call tabuleiro_imagem();";
        $resultado = mysqli_query($connect, $sql);
        while($dados = mysqli_fetch_assoc($resultado)){  
            echo '<form action="../../../includes/delete.php" method="post">';
            echo '<input type="hidden" name="opcao" value="deletarImagemTabuleiro">';
            echo '<input type="hidden" name="id" value="' . $dados['ID'] . '">';
            echo '<label for="imagem">Imagem: </label>';
            echo '<input type="text" name="imagem" id="imagem" value="' . $dados['Imagem'] . '" disabled>';
            echo '<label for="posicao">Posição: </label>';
            echo '<input type="number" name="posicao" id="posicao" value="' . $dados['Posicao'] . '" disabled>';
            echo '<label for="tabuleiro">Tabuleiro: </label>';
            echo '<input type="text" name="tabuleiro" id="tabuleiro" value="' . $dados['Tabuleiro'] . '" disabled>';
            echo '<a href="../update/updateimageboard.php?id='. $dados['ID'] . '" >Editar</a>';
            echo '<button type="submit" >Excluir</button>';
            echo '<br>';
            echo '</form>';
        }
    }
?>