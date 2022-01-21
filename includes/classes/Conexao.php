<?php
    class Conexao{
        public static $usuario = "wiris";
        public static $senha = "1+1Wiris1+1";
        public static $banco = "softedu";
        public static $endereco = "localhost";

        public static function Conectar(){
            $conexao = new mysqli(self::$endereco, self::$usuario, self::$senha, self::$banco);
            return $conexao;
        }
    }
?>