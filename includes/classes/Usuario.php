<?php
class Usuario
{
    private $id;
    private $nome;
    private $senha;
    private $login;
    private $dataCadastro;
    private $perfilUsuario;
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::Conectar();
    }
    public function getConexao()
    {
        return $this->conexao;
    }

    public function getNome()
    {
        return $this->Nome;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getSenha()
    {
        return $this->senha;
    }
    public function getLogin()
    {
        return $this->login;
    }
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }
    public function getPerfilUsuario()
    {
        return $this->perfilUsuario;
    }

    public function Create($nome, $login, $senha, $perfilUsuario)
    {
        $this->nome = $this->conexao->escape_string($nome);
        $this->login =  $this->conexao->escape_string($login);
        $this->senha = $this->conexao->escape_string($senha);
        $this->perfilusuario =  intval($this->conexao->escape_string($perfilUsuario));

        $sql = "INSERT INTO usuario(nomeCompletoUsuario, senha, `login`, dataCadastro, perfilUsuarioID) VALUES('$this->nome', '$this->senha', '$this->login', now(), '$this->perfilusuario');";

        return $this->conexao->query($sql);
    }
    public function Read()
    {
        $sql = "SELECT * FROM usuario";
        $resultado = $this->conexao->query($sql);
        echo '<table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th >Nome</th>
                    <th>Login</th>
                    <th>Data de Cadastro</th>
                    <th>Nível</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>';
        while ($dados = $resultado->fetch_assoc()) {
            $data = new DateTime($dados['dataCadastro']);
            echo '<tr>';
            echo '<form action="../../../includes/delete.php" method="post">';
            echo '<input type="hidden" name="opcao" value="deletarUsuario">';
            echo '<input type="hidden" name="id" value="' . $dados['idusuario'] . '">';
            echo '<td>' . $dados['idusuario'] . '</td>';
            echo '<td >' . mb_strimwidth($dados['nomeCompletoUsuario'], 0, 15, "...") . '</td>';
            echo '<td>' . $dados['login'] . '</td>';
            echo "<td>" . $data->format('d/m/Y') . "</td>";
            echo '<td>' . $dados['perfilUsuarioID'] . '</td>';
            echo '<td><a href="../update/updateuser.php?id=' . $dados['idusuario'] . '" >Editar</a>';
            echo '<td><button type="submit" >Excluir</button>';
            echo '</form>';
            echo '</tr>';
        }
        echo '</tbody>
        </table>';
    }

    public function Update($id, $nome, $login, $senha, $perfilUsuario)
    {

        $this->id = intval($this->conexao->escape_string($id));
        $this->nome = $this->conexao->escape_string($nome);
        $this->login =  $this->conexao->escape_string($login);
        $this->senha = $this->conexao->escape_string($senha);
        $this->perfilusuario =  intval($this->conexao->escape_string($perfilUsuario));

        $sql = "UPDATE usuario SET nomeCompletoUsuario='$this->nome', `login`='$this->login', senha='$this->senha',perfilUsuarioID='$this->perfilusuario'  WHERE idusuario = '$this->id';";

        return $this->conexao->query($sql);
    }

    public function Delete($id)
    {
        $this->id = $this->conexao->escape_string($id);
        $sql = "DELETE FROM usuario WHERE idusuario = '$this->id';";
        return $this->conexao->query($sql);
    }
}
