<!-- 2ª Digitação (Aqui) -->
<?php
session_start();
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = ($_POST['email']);

    $sql = "SELECT * FROM usuarios WHERE nome='$nome' AND email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['nome'] = $nome;
        header('Location: coisa.html');
    } else {
        $error = "Usuário ou email inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="login_bg">
    <div">
        <div class="hd_login">
            <h3>Login</h3>
        </div>
        <div class="formu">
            <form method="post" action="">
                <label for="nome">Ususario :</label>
                        <input type="text" name="nome" required>
                        <label for="email">Email :</label>
                                <input type="email" name="email" required>
                                <button type="submit">Entrar</button>
                                <?php if (isset($error)) echo "<p class='message error' >$error</p>"; ?>
            </form>
        </div>
    </div>
</body>

</html>