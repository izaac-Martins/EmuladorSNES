<?php
include('conexao.php');

$id = $_GET['id'];

$sql = "DELETE FROM comentarios WHERE id = $id";

$mysqli->query($sql);
exit;
?>