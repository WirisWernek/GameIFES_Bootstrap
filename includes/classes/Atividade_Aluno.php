<?php

class AtividadeAluno
{
    private $id;
    private $descricao;
    private $tabuleiro;
    private $usuario;
    private $status;
    private $inicio;
    private $fim;
    private $atividade;
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::Conectar();
    }

    public function getId()
    {
        return $this->id;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function getTabuleiro()
    {
        return $this->tabuleiro;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function getInicio()
    {
        return $this->inicio;
    }
    public function getFim()
    {
        return $this->fim;
    }
    public function getAtividade()
    {
        return $this->atividade;
    }
    public function getConexao()
    {
        return $this->conexao;
    }
    public function Create($idUsuario, $idAtividade, $idTabuleiro, $descricao)
    {
        $this->usuario = intval($this->conexao->escape_string($idUsuario));
        $this->atividade = intval($this->conexao->escape_string($idAtividade));
        $this->tabuleiro = intval($this->conexao->escape_string($idTabuleiro));
        $this->descricao = $this->conexao->escape_string($descricao);

        $sql = "INSERT INTO atividade_aluno(descricaoatividade, tabuleiroid, usuarioid, `status`, datainicio, atividadeid) VALUES('$this->descricao', '$this->tabuleiro','$this->usuario', 'Iniciado', now() , '$this->atividade');";

        return $this->conexao->query($sql);
    }
    public function Delete($id)
    {
        $this->id = intval($this->conexao->escape_string($id));
        $sql = "UPDATE atividade_aluno SET `status`='Finalizado', datafim = now() WHERE idatividade_aluno = '$this->id';";
        return $this->conexao->query($sql);
    }
    public function NovaAtividade()
    {
        $sql = "call atividade();";
        $resultado = $this->conexao->query($sql);
        return $resultado;
    }
    public function AtividadesEmAndamento($id)
    {
        $this->id = intval($this->conexao->escape_string($id));
        $sql = "call atividades_em_andamento('$this->id');";
        $resultado = $this->conexao->query($sql);
        return $resultado;
    }
    public function AtividadesFinalizadas($id)
    {
        $this->id = intval($this->conexao->escape_string($id));
        $sql = "call atividades_finalizadas('$this->id');";
        $resultado = $this->conexao->query($sql);
        return $resultado;
    }
}
