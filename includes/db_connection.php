<?php
// $diretorio = $_SERVER['DOCUMENT_ROOT'] . '/includes/env.php';
// include_once $diretorio;
$connect = mysqli_connect($_ENV['HOST'], $_ENV['USER'], $_ENV['PASSWORD'], $_ENV['DATABASE']);
mysqli_set_charset($connect, "utf8");

if (mysqli_connect_error()) {
    echo "Erro na conexão: " . mysqli_connect_error();
}
