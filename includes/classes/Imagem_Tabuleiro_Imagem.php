<?php
class ImagemTabuleiroImagem
{
    public $id;
    public $tabuleiro;
    public $imagem;
    public $posicao;
    public $conexao;

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
    public function getTabuleiro()
    {
        return $this->tabuleiro;
    }
    public function getImagem()
    {
        return $this->imagem;
    }
    public function getPosicao()
    {
        return $this->posicao;
    }

    public function Create($imagem, $tabuleiro, $posicao)
    {
        $this->imagem = intval($this->conexao->escape_string($imagem));
        $this->tabuleiro = intval($this->conexao->escape_string($tabuleiro));
        $this->posicao = intval($this->conexao->escape_string($posicao));

        $sql = "INSERT INTO tabuleiro_imagenstabuleiro(imagenstabuleiroID, tabuleiroID, posicaoTabuleiro) VALUES('$this->imagem', '$this->tabuleiro', '$this->posicao');";

        return $this->conexao->query($sql);
    }
    public function Read()
    {
        $sql = "call tabuleiro_imagem();";
        $resultado = $this->conexao->query($sql);
        while ($dados = $resultado->fetch_assoc()) {
            echo '<hr>';
            echo '<form action="../../../actions/delete.php" method="post">';
            echo '<input type="hidden" name="opcao" value="deletarFundoTabuleiro">';
            echo '<input type="hidden" name="id" value="' . $dados['ID'] . '">';
            echo '<label class="form-label mt-1" for="imagem">Imagem: </label>';
            echo '<input class="form-control mb-1" type="text" name="imagem" id="imagem" value="' . $dados['Imagem'] . '" disabled>';
            echo '<label class="form-label mt-1" for="posicao">Posição: </label>';
            echo '<input class="form-control mb-1" type="number" name="posicao" id="posicao" value="' . $dados['Posicao'] . '" disabled>';
            echo '<label class="form-label mt-1" for="tabuleiro">Tabuleiro: </label>';
            echo '<input class="form-control mb-1" type="text" name="tabuleiro" id="tabuleiro" value="' . $dados['Tabuleiro'] . '" disabled>';
            echo '<a class="btn btn-primary me-1" href="../update/updatebackgroundboard.php?id=' . $dados['ID'] . '" >Editar</a>';
            echo '<button class="btn btn-danger" type="submit">Excluir</button>';
            echo '<br>';
            echo '</form>';
        }
    }
    public function Update($id, $imagem, $tabuleiro, $posicao)
    {
        $this->id = intval($this->conexao->escape_string($id));
        $this->imagem = intval($this->conexao->escape_string($imagem));
        $this->tabuleiro = intval($this->conexao->escape_string($tabuleiro));
        $this->posicao = intval($this->conexao->escape_string($posicao));
        $sql = "UPDATE tabuleiro_imagenstabuleiro SET tabuleiroID='$this->tabuleiro', imagenstabuleiroID='$this->imagem',  posicaoTabuleiro='$this->posicao' WHERE idtabuleiro_imagenstabuleiro = '$this->id';";
        return $this->conexao->query($sql);
    }
    public function Delete($id)
    {
        $this->id = intval($this->conexao->escape_string($id));
        $sql = "DELETE FROM tabuleiro_imagenstabuleiro WHERE idtabuleiro_imagenstabuleiro = '$this->id';";
        return $this->conexao->query($sql);
    }
}
