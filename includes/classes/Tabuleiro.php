<?php
class Tabuleiro
{
    private $id;
    private $planta;
    private $descricao;
    private $dataCriacao;
    private $usuario;
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::Conectar();
    }
    public function getConexao()
    {
        return $this->conexao;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getPlanta()
    {
        return $this->planta;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function Create($descricao, $planta)
    {
        $this->descricao = $this->conexao->escape_string($descricao);
        $this->planta = $this->conexao->escape_string($planta);
        $this->usuario = $_SESSION['id'];

        $sql = "INSERT INTO tabuleiro(descricao, plantaTabuleiro, dataCriacao, usuario) VALUES('$this->descricao', '$this->planta', now(),' $this->usuario');";

        return $this->conexao->query($sql);
    }
    public function Read()
    {
        $sql = "SELECT * FROM tabuleiro";
        $resultado = $this->conexao->query($sql);
        while ($dados = $resultado->fetch_assoc()) {
            $data = new DateTime($dados['dataCriacao']);
            echo '<form action="../../../actions/delete.php" method="post">';
            echo '<input type="hidden" name="opcao" value="deletarTabuleiro">';
            echo '<input type="hidden" name="id" value="' . $dados['idtabuleiro'] . '">';
            echo '<label for="planta">Planta do Tabuleiro: </label>';
            echo '<input type="text" name="planta" id="planta" value="' . $dados['plantaTabuleiro'] . '" disabled>';
            echo '<label for="descricao">Descrição: </label>';
            echo '<input type="text" name="descricao" id="descricao" value="' . $dados['descricao'] . '" disabled>';
            echo '<label for="data">Data de Criação: </label>';
            echo '<input type="text" name="data" id="data" value="' . $data->format('d/m/Y') . '" disabled>';
            echo '<a href="../update/updateboard.php?id=' . $dados['idtabuleiro'] . '" >Editar</a>';
            echo '<button type="submit" >Excluir</button>';
            echo '<br>';
            echo '</form>';
        }
    }
    public function Update($id, $descricao, $planta)
    {
        $this->id = $this->conexao->escape_string($id);
        $this->descricao = $this->conexao->escape_string($descricao);
        $this->planta = $this->conexao->escape_string($planta);
        $sql = "UPDATE tabuleiro SET plantaTabuleiro='$this->planta', descricao='$this->descricao' WHERE idtabuleiro = '$this->id';";
        return $this->conexao->query($sql);
    }
    public function Delete($id)
    {
        $this->id = $this->conexao->escape_string($id);
        $sql = "DELETE FROM tabuleiro WHERE idtabuleiro = '$id';";
        return $this->conexao->query($sql);
    }
}
