<?php
$diretorio = $_SERVER['DOCUMENT_ROOT'] . '/includes/env.php';
include_once $diretorio;
$connect = mysqli_connect($server, $user, $password, $db);
mysqli_set_charset($connect, "utf8");

if (mysqli_connect_error()) {
    echo "Erro na conexão: " . mysqli_connect_error();
}
