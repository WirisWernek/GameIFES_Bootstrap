<?php
// $diretorio = $_SERVER['DOCUMENT_ROOT'] . '/includes/env.php';
// include_once $diretorio;
$connect = mysqli_connect("us-cdbr-east-05.cleardb.net", "b85cc0b2613008", "595391d3", "heroku_61081410bf8af24");
mysqli_set_charset($connect, "utf8");

if (mysqli_connect_error()) {
    echo "Erro na conexão: " . mysqli_connect_error();
}
