<?php

class AtividadeAluno{
    private $id;
    private $descricao;
    private $tabuleiro;
    private $usuario;
    private $status;
    private $inicio;
    private $fim;
    private $atividade;
    private $conexao;

    public function __construct(){
        $this->usuario = $_SESSION['id'];
        $this->conexao = Conexao::Conectar();
    }

    public function getId(){
        return $this->id;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function getTabuleiro(){
        return $this->tabuleiro;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getInicio(){
        return $this->inicio;
    }
    public function getFim(){
        return $this->fim;
    }
    public function getAtividade(){
        return $this->atividade;
    }
    public function getConexao(){
        return $this->conexao;
    }
    public function Delete($id){
       
        $sql = "UPDATE atividade_aluno SET `status`='Finalizado', datafim = now() WHERE idatividade_aluno = '$id';";
    
        if($this->conexao->query($sql)){
            $_SESSION['mensagem']= "Atividade Finalizado com sucesso!";
            header('Location: ./index.php');
        }else{
            $_SESSION['mensagem']= "Erro ao finalizar atividade!";
            echo $this->conexao->error;
        }
    }
    public function NovaAtividade(){
        $sql = "call atividade();";
        $resultado = $this->conexao->query($sql);
        return $resultado;
    }
    public function AtividadesEmAndamento(){
        $id = $_SESSION['id'];
        $sql = "call atividades_em_andamento('$id');";
        $resultado = $this->conexao->query($sql);
        return $resultado;
    
    }
    public function AtividadesFinalizadas(){
        $id = $_SESSION['id'];
        $sql = "call atividades_finalizadas('$id');";
        $resultado = $this->conexao->query($sql);
        return $resultado;
    }

}
?>