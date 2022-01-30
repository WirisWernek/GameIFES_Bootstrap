<?php
class ImagemTabuleiro
{
    private $id;
    private $url;
    private $tipo;
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

    public function getUrl()
    {
        return $this->url;
    }

    public function getTipo()
    {
        return $this->tipo;
    }
    public function Create($url, $tipo)
    {
        $this->url = $this->conexao->escape_string($url);
        $this->tipo = intval($this->conexao->escape_string($tipo));

        $sql = "INSERT INTO imagenstabuleiro(urlImagem, tipoimagemid) VALUES('$this->url', '$this->tipo');";
        return $this->conexao->query($sql);
    }
    public function Read()
    {
        $sql = "call imagensTabuleiro();";
        $resultado = $this->conexao->query($sql);
        while ($dados = $resultado->fetch_assoc()) {
            echo '<hr>';
            echo '<form action="../../../actions/delete.php" method="post">';
            echo '<input type="hidden" name="opcao" value="deletarImagem">';
            echo '<input type="hidden" name="id" value="' . $dados['ID'] . '">';
            echo '<label class="form-label mt-1" for="url">URL: </label>';
            echo '<input class="form-control mb-1" type="text" name="url" id="url" value="' . $dados['URL'] . '" disabled>';
            echo '<label class="form-label mt-1" for="tipo">Tipo de Imagem: </label>';
            echo '<input class="form-control mb-1" type="text" name="tipo" id="tipo" value="' . $dados['Tipo'] . '" disabled>';
            echo '<a class="btn btn-primary me-1" href="../update/updateimage.php?id=' . $dados['ID'] . '" >Editar</a>';
            echo '<button class="btn btn-danger" type="submit" >Excluir</button>';
            echo '<br>';
            echo '</form>';
        }
    }
    public function Update($id, $url, $tipo)
    {
        $this->id = intval($this->conexao->escape_string($id));
        $this->url = $this->conexao->escape_string($url);
        $this->tipo = intval($this->conexao->escape_string($tipo));
        $sql = "UPDATE imagenstabuleiro SET urlImagem='$this->url', tipoimagemid='$this->tipo' WHERE idimagenstabuleiro = '$this->id';";
        return $this->conexao->query($sql);
    }
    public function Delete($id)
    {
        $this->id = intval($this->conexao->escape_string($id));
        $sql = "DELETE FROM imagenstabuleiro WHERE idimagenstabuleiro = '$this->id';";
        return $this->conexao->query($sql);
    }
}
