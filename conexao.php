<?php
    $usuario = 'root';
    $senha = '';
    $database = 'login';
    $host = 'localhost';

    $mysqli = new mysqli($host, $usuario, $senha, $database);

    if ($mysqli->connect_errno) {
        die("Falha na conexão: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
    }

    // forçar charset UTF-8 para evitar erro com acentuação
    $mysqli->set_charset("utf8");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
