<?php
include("conexao.php");

// Query corrigida
$sql = "SELECT comentarios.id, comentarios.comentario, comentarios.data, 
               usuarios.nome, usuarios.id AS userID
        FROM comentarios
        INNER JOIN usuarios 
            ON usuarios.id = comentarios.id_usuario
        ORDER BY comentarios.id DESC";

$query = $mysqli->query($sql);

while($c = $query->fetch_assoc()){

    echo "<div class='mensagem'>
            <strong>{$c['nome']}:</strong> {$c['comentario']}<br>
            <small>{$c['data']}</small>";

    // Corrigido para usar o nome correto na sessão
    if(isset($_SESSION['id']) && $_SESSION['id'] == $c['userID']){
        echo "<button class='excluir-btn' data-id='{$c['id']}'>Excluir</button>";
    }

    echo "</div>";
}
?>

<script>
document.addEventListener("click", function(e) {
    if (e.target.classList.contains("excluir-btn")) {
        e.preventDefault();

        let id = e.target.getAttribute("data-id");

        fetch("excluir.php?id=" + id, {
            method: "GET"
        })
        .then(res => res.text())
        .then(data => {
            console.log("Excluído:", data);
            location.reload(); // recarrega a página após excluir
        })
        .catch(err => console.error(err));
    }
});
</script>