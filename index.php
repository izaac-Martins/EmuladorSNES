<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RetroGames</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- cabeçalho -->
    <header class="navbar">
        <div class="nav-esq">
            <h1 class="logo">Retro Games</h1>
            <nav>
                <a href="#">Início</a>
                
            </nav>
        </div>
        <div class="nav-dir">
            <?php if(isset($_SESSION['id'])): ?>
                <p><?php echo $_SESSION['nome']; ?></p>
                 <button class='logout-btn'>Logout</button>
            <?php else: ?>
                <a href="login.php" class="login-btn">Login</a>
            <?php endif; ?>
        </div>
    </header>
    <!-- sessão de jogos -->
    <section class="section-game">
        <h2 class="title-section">Catálogo de jogos</h2>
        <div class="grade-game">

            <!-- grade de cima -->
            <a href="supermario.php"><div class="card-game"><img src="img/supermario.jpg"><span class="tag">Jogos Clássicos</span><h3>Super Mario Wolrd</h3></div></a>
            <a href="kong.php"><div class="card-game"><img src="img/kong.jpg"><span class="tag">Jogos Clássicos</span><h3>Donkey Kong Country</h3></div></a>
            <a href="megax.php"><div class="card-game"><img src="img/megamax.jpg"><span class="tag">Jogos Clássicos</span><h3>Mega Man X</h3></div></a>
            <a href="street.php"><div class="card-game"><img src="img/street.jpg"><span class="tag">Jogos Clássicos</span><h3>Street Fighter II</h3></div></a>
            <a href="mortal.php"><div class="card-game"><img src="img/mortal.jpg"><span class="tag">Jogos Clássicos</span><h3>Mortal Kombat</h3></div></a>

           <!-- grade de baixo -->
           <a href="mariokart.php"><div class="card-game"><img src="img/MarioKart.jpg"><span class="tag">Jogos Clássicos</span><h3>Super Mario Kart</h3></div></a>
           <a href="yoshi.php"><div class="card-game"><img src="img/yoshi.jpg"><span class="tag">Jogos Clássicos</span><h3>Super Mario Word 2 Yoshi's Island</h3></div></a>
           <a href="castlevania.php"><div class="card-game"><img src="img/castlevania.jpg"><span class="tag">Jogos Clássicos</span><h3>Castlevania IV</h3></div></a>
           <a href="zelda.php"><div class="card-game"><img src="img/zelda.jpg"><span class="tag">Jogos Clássicos</span><h3>The Legend of Zelda </h3></div></a>
           <a href="fzero.php"><div class="card-game"><img src="img/fzero.jpg"><span class="tag">Jogos Clássicos</span><h3>F-Zero</h3></div></a>

        </div>
    </section>
    
</body>
</html>

<script>
document.addEventListener("click", function(e) {
    if (e.target.classList.contains("logout-btn")) {
        e.preventDefault();

        fetch("logout.php", {
            method: "POST"
        })
        .then(res => res.text())
        .then(data => {
            location.reload();
        })
        .catch(err => console.error(err));
    }
});
</script>