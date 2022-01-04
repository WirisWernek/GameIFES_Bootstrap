<?php
    $server = "localhost";
    $user = "remote";
    $password = "x>/eD[iZ9)lY/NFe+h2T";
    $db = "softedu";
    $connect = mysqli_connect($server, $user, $password, $db);
    mysqli_set_charset($connect, "utf8");

    if(mysqli_connect_error()) {
    echo "Erro na conexão: " . mysqli_connect_error();
    }
?>