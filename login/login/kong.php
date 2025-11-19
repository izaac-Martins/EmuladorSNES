<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="mario.css">
    <title>SNES</title>
  </head>

  <body>
    <header>
     <a href="index.php">  
     <button class='logout-btn'>Voltar</button>
      </a>
    </header>
    
    <div id="container">

      
      <div id="game-container">
        <div id="game"></div>
      </div>

      
      <div id="chat-container">
        <h2>Chat</h2>

       
        <div id="chat-messages">
            <?php include("listarComentarios.php"); ?>
        </div>

       
        <?php if(isset($_SESSION['id'])): ?>
            <form action="comentar.php" method="POST" id="chat-form">
              <textarea name="comentario" placeholder="Digite aqui..."></textarea>
              <button>Enviar</button>
            </form>
        <?php else: ?>
            <p style="color: #ccc;">Faça login para comentar.</p>
        <?php endif; ?>

      </div>

    </div>

    <script type="text/javascript">
      EJS_player = "#game";
      EJS_core = "snes";
      EJS_lightgun = false;
      EJS_gameUrl = "/login/kong.smc";
      EJS_pathtodata = "https://cdn.emulatorjs.org/4.2.3/data/";

      document.getElementById("chat-form").addEventListener("submit", function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch("comentar.php", {
            method: "POST",
            body: formData
        })
        .then(res => res.text())
        .then(data => {
            location.reload();
        }).catch(err => console.error(err));
      });
        
    </script>

    <script src="https://cdn.emulatorjs.org/4.2.3/data/loader.js"></script>

  </body>
</html>
