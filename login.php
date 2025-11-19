<?php
include('conexao.php');

if(isset($_POST['email']) && isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0 ){
        echo "Preencha seu email";
    } else if(strlen($_POST['senha']) == 0){
        echo "Preencha sua senha!";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){

            $usuario = $sql_query->fetch_assoc();

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: index.php");
            exit;
        } else {
            echo "Falha ao logar! E-mail ou senha incorretos.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<div class="container">

    <h1 class="titulo-login">Acessar login</h1>

    <form action="" method="POST" class="form-login">

        <p>
            <label for="email">E-mail</label>
            <input id="email" type="text" name="email">
        </p>

        <p>
            <label for="senha">Senha</label>
            <input id="senha" type="password" name="senha">
        </p>

        <p>
            <button type="submit">Entrar</button>
        </p>

    </form>

    <p class="link-criar-conta">
        <a href="cadastro.php">Criar uma conta</a>
    </p>

</div>

</body>
</html>
