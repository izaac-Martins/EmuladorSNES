<?php
include('conexao.php');

$comentario = $_POST['comentario'];
$id = $_SESSION['id'];

$sql = "INSERT INTO comentarios (comentario, `data`, id_usuario) VALUES ('$comentario', NOW(), $id)";

$mysqli->query($sql);
exit;
?>