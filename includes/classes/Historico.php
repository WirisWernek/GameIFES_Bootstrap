<?php
class Historico
{
    private $id;
    private $hora_data;
    private $tempo;
    private $conexao;


    public function __construct()
    {
        $this->conexao = Conexao::Conectar();
    }
    public function Create($id)
    {
        $this->id = intval($this->conexao->escape_string($id));
        $sql = "INSERT INTO historicoacessos(idhistoricoacessos, hora_data, tempoacesso) VALUES('$this->id', now(), 0)";
        return $this->conexao->query($sql);
    }
    public function Login($id)
    {
        $this->id = $this->conexao->escape_string($id);
        $sql = "UPDATE historicoacessos SET hora_data=now(), tempoacesso=0 WHERE idhistoricoacessos='$this->id';";
        return $this->conexao->query($sql);
    }
    public function Logout($id)
    {
        $this->id = intval($this->conexao->escape_string($id));
        $sql = "call set_tempo_acesso('$this->id', now());";
        return $this->conexao->query($sql);
    }
}
