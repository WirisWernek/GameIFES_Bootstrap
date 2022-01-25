<?php

class CategoriaAtividade
{
    private $id;
    private $descricao;
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::Conectar();
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function getConexao()
    {
        return $this->conexao;
    }

    public function Create($descricao)
    {
        $this->descricao = $this->conexao->escape_string($descricao);
        $sql = "INSERT INTO categoriaatividade(descricao) VALUES(' $this->descricao');";
        return $this->conexao->query($sql);
    }

    public function Read()
    {
        $sql = "SELECT * FROM categoriaatividade";
        $resultado = $this->conexao->query($sql);
        while ($dados = $resultado->fetch_assoc()) {
            echo '<form action="../../../includes/delete.php" method="post">';
            echo '<input type="hidden" name="opcao" value="deletarCategoria">';
            echo '<input type="hidden" name="id" value="' . $dados['idcategoriaAtividade'] . '">';
            echo '<label for="descricao">Descrição: </label>';
            echo '<input type="text" name="descricao" id="descricao" value="' . $dados['descricao'] . '" disabled>';
            echo '<a href="../update/updateworkcategory.php?id=' . $dados['idcategoriaAtividade'] . '" >Editar</a>';
            echo '<button type="submit" >Excluir</button>';
            echo '<br>';
            echo '</form>';
        }
    }

    public function Update($id, $descricao)
    {
        $this->id = $this->conexao->escape_string($id);
        $this->descricao = $this->conexao->escape_string($descricao);
        $sql = "UPDATE categoriaatividade SET descricao='$this->descricao' WHERE idcategoriaAtividade = '$this->id';";
        return $this->conexao->query($sql);
    }

    public function Delete($id)
    {
        $this->id = $this->conexao->escape_string($id);
        $sql = "DELETE FROM categoriaatividade WHERE idcategoriaAtividade = '$this->id';";
        return $this->conexao->query($sql);
    }
}
