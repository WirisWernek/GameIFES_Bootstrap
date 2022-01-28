<?php
    class Conexao{
        public static $usuario = "root";
        public static $senha = "jinjoe0067";
        public static $banco = "softedu";
        public static $endereco = "127.0.0.1";

        public static function Conectar(){
            $conexao = new mysqli(self::$endereco, self::$usuario, self::$senha, self::$banco);
            return $conexao;
        }
    }
