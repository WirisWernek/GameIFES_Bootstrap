<?php

class Atividade
{
    private $id;
    private $descricao;
    private $categoria;
    private $nivel;
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
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
    public function getNivel()
    {
        return $this->nivel;
    }
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    }
    public function getConexao()
    {
        return $this->conexao;
    }

    public function Create($descricao, $categoria, $nivel)
    {
        $this->descricao = $this->conexao->escape_string($descricao);
        $this->categoria = $this->conexao->escape_string($categoria);
        $this->nivel = $this->conexao->escape_string($nivel);
        $sql = "INSERT INTO atividade(descricacao, categoriaatividadeid, nivelatividadeid) VALUES('$this->descricao', '$this->categoria', '$this->nivel');";
        return $this->conexao->query($sql);
    }

    public function Read()
    {
        $sql = "call atividade();";
        $resultado = $this->conexao->query($sql);
        while ($dados = $resultado->fetch_assoc()) {
            echo '<form action="../../../actions/delete.php" method="post">';
            echo '<input type="hidden" name="opcao" value="deletarAtividade">';
            echo '<input type="hidden" name="id" value="' . $dados['IdAtividade'] . '">';
            echo '<label for="descricao">Descrição: </label>';
            echo '<input type="text" name="descricao" id="descricao" value="' . $dados['Descricao'] . '" disabled>';
            echo '<label for="categoria">Categoria: </label>';
            echo '<input type="text" name="categoria" id="categoria" value="' . $dados['Categoria'] . '" disabled>';
            echo '<label for="nivel">Nível: </label>';
            echo '<input type="text" name="nivel" id="nivel" value="' . $dados['Nivel'] . '" disabled>';
            echo '<a href="../update/updatework.php?id=' . $dados['IdAtividade'] . '" >Editar</a>';
            echo '<button type="submit" >Excluir</button>';
            echo '<br>';
            echo '</form>';
        }
    }

    public function Update($id, $descricao, $categoria, $nivel)
    {
        $this->id = $this->conexao->escape_string($id);
        $this->descricao = $this->conexao->escape_string($descricao);
        $this->categoria = $this->conexao->escape_string($categoria);
        $this->nivel = $this->conexao->escape_string($nivel);
        $sql = "UPDATE atividade SET descricacao='$this->descricao', categoriaatividadeid='$this->categoria', nivelatividadeid='$this->nivel' WHERE idatividade = '$this->id';";
        return $this->conexao->query($sql);
    }

    public function Delete($id)
    {
        $this->id = $this->conexao->escape_string($id);
        $sql = "DELETE FROM atividade WHERE idatividade = '$id';";
        return $this->conexao->query($sql);
    }
}
