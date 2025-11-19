<?php
include('conexao.php');

if (isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['nome'])) {

    if(strlen($_POST['nome']) == 0){
        echo "Preencha seu nome!";
    } else if(strlen($_POST['email']) == 0){
        echo "Preencha seu email!";
    } else if(strlen($_POST['senha']) == 0){
        echo "Preencha sua senha!";
    } else {

        $nome = $mysqli->real_escape_string($_POST['nome']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        //Verifica se o e-mail já existe//
        $check = $mysqli->query("SELECT * FROM usuarios WHERE email = '$email'");

        if($check->num_rows > 0){
            echo "Este e-mail já está cadastrado!";
        } else {
            // Salva no banco de dados
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
            
            if($mysqli->query($sql)){
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
            } else {
                echo "Erro ao cadastrar: " . $mysqli->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<h1>Criar conta</h1>

<form action="" method="POST">

    <p>
        <label>Nome</label>
        <input type="text" name="nome">
    </p>

    <p>
        <label>E-mail</label>
        <input type="text" name="email">
    </p>

    <p>
        <label>Senha</label>
        <input type="password" name="senha">
    </p>

    <div class="button-container">
        <button type="submit">Cadastrar</button>
    </div>

</form>

<p><a href="login.php">Já tem conta? Faça login</a></p>

</body>
</html>
