<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Young+Serif">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senai</title>
    <link rel="stylesheet" href="css\stylelogin.css">
    <link rel="icon" href="images/logo.png" type="image/x-icon">

    <style>
  .password-toggle {
    position: relative;
}

#password {
    padding-right: 30px;
}

#eye-icon {
    position: absolute;
    top: 50%;
    right: 5px;
    transform: translateY(-50%);
    cursor: pointer;
}
</style>
</head>

<body>

        <div class="container">
            <div class="login" id="loginBox">
                <div class="logo">
                    <img src="images/logo2.png">
                </div>
                <div class="inputs">
                    <form action="Processa_login.php" method="POST">
                        <input type="hidden" name="operacao" value="realiza_login">
                        <label for="username" class="username">Usuário:</label><br>
                        <div class="input"> 
                            <input type="text" id="username" name="username" required><br><br>
                        </div>
                        <label for="password">Senha:</label><br>
                        <div class="password-toggle">
                        <input type="password" id="password" name="password" placeholder="Senha">
                            <img id="eye-icon" src="images/olho-fechado.png" alt="Ícone de olho fechado" onclick="togglePasswordVisibility()"> <!-- Ícone de olho fechado -->
                        </div>
                        <div class="separa_aviso">
                        <?php
                            // Inicie a sessão (se ainda não estiver iniciada)
                            session_start();

                            // Verifique se há uma mensagem de aviso na sessão
                            if (isset($_SESSION["mensagem"])) {
                                echo '<div class="aviso">' . $_SESSION["mensagem"] . '</div>';
                                unset($_SESSION["mensagem"]); // Limpe a mensagem da sessão para que ela não seja exibida novamente
                                echo  $_SESSION["mensagem2"] ;
                                unset($_SESSION["mensagem2"]); // Limpe a mensagem da sessão para que ela não seja exibida novamente
                            }
                        ?>
                        </div>
                        <div class="submit">
                            <input type="submit" value="Login" id="changeHeightButton">
                        </div>
                        
                        </form>

                </div>
            </div>
        </div>
        <script>
            function togglePasswordVisibility() {
                var passwordInput = document.getElementById("password");
                var eyeIcon = document.getElementById("eye-icon");

                if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.src = "images/icone-olho-aberto.png"; // Imagem de olho aberto
                eyeIcon.alt = "Ícone de olho aberto";
                } else {
                passwordInput.type = "password";
                eyeIcon.src = "images/olho-fechado.png"; // Imagem de olho fechado
                eyeIcon.alt = "Ícone de olho fechado";
                }
            }
        </script>
</body>

</html>