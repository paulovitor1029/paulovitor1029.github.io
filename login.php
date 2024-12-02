<?php
session_start();
require_once 'config.php';

function verifyGoogleToken($token) {
    $clientId = '336160376343-9mr7fguersf0dvmvcbldvf7t9g7keuu7.apps.googleusercontent.com';
    $url = 'https://oauth2.googleapis.com/tokeninfo?id_token=' . $token;

    $response = file_get_contents($url);
    $payload = json_decode($response, true);

    if ($payload && isset($payload['aud']) && $payload['aud'] === $clientId) {
        return $payload;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        if ($_POST['submit'] == 'register') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if (empty($nome) || empty($email) || empty($senha)) {
                echo "Por favor, preencha todos os campos.";
                exit();
            }

            $query = "SELECT id FROM usuarios WHERE email = ?";
            $stmt = mysqli_prepare($conexao, $query);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) > 0) {
                echo "Este e-mail já está cadastrado. Por favor, faça login.";
                mysqli_stmt_close($stmt);
                exit();
            }
            mysqli_stmt_close($stmt);

            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            $query = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conexao, $query);
            mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $senhaHash);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                echo "Cadastro realizado com sucesso!";
            } else {
                echo "Erro ao registrar: " . mysqli_error($conexao);
            }
            mysqli_stmt_close($stmt);
        }

        if ($_POST['submit'] == 'login') {
            $email = $_POST['email-login'];
            $senha = $_POST['senha-login'];

            if (empty($email) || empty($senha)) {
                echo "Todos os campos precisam ser preenchidos.";
                exit();
            }

            $query = "SELECT senha FROM usuarios WHERE email = ?";
            $stmt = mysqli_prepare($conexao, $query);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $senhaHash);
            mysqli_stmt_fetch($stmt);

            if (password_verify($senha, $senhaHash)) {
                $_SESSION['email-login'] = $email;
                header('Location: index2.php');
                exit();
            } else {
                echo "Senha incorreta ou usuário não registrado.";
            }
            mysqli_stmt_close($stmt);
        }
    } elseif (isset($_POST['credential'])) {
        $token = $_POST['credential'];
        $payload = verifyGoogleToken($token);

        if ($payload) {
            $email = $payload['email'];
            $nome = $payload['name'];

            $query = "SELECT id FROM usuarios WHERE email = ?";
            $stmt = mysqli_prepare($conexao, $query);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $userId);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            if (!$userId) {
                $query = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";
                $stmt = mysqli_prepare($conexao, $query);
                mysqli_stmt_bind_param($stmt, "ss", $nome, $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                $_SESSION['email-login'] = $email;
                $_SESSION['nome'] = $nome;
            } else {
                $_SESSION['email-login'] = $email;
            }
            header('Location: index2.php');
            exit();
        } else {
            echo "Falha no login do Google, tente novamente.";
        }
    }
}
?>



 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mdevelop</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <div class="container">
    
            
    

    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script> 
    function handleCredentialResponse(response) {
    
        document.getElementById('google-signin-credential').value = response.credential;
        document.getElementById('google-signin-form').submit();
    }

    window.onload = function() {
        google.accounts.id.initialize({
            client_id: "336160376343-9mr7fguersf0dvmvcbldvf7t9g7keuu7.apps.googleusercontent.com",
            callback: handleCredentialResponse
        });

        google.accounts.id.prompt();  // Mostra o prompt para login com o Google
    };


    </script>

    
</head>
<body>
    <div class="container">
   
        <div class="content first-content">
            <div class="first-column">
                <h2 class="titulo title1">Bem-vindo de volta!</h2>
                <p class="paragrafo paragrafo1">Faça seu login para continuar navegando</p>
                <button id="signin" class="btn btn1">Entrar</button>
            </div>
            <div class="second-column">
                <h2 class="titulo title2">Criar conta</h2>
                <div class="rede-social">
                    <ul class="list-rede-social">
                        
                            <div id="g_id_onload"
                                 data-client_id="336160376343-9mr7fguersf0dvmvcbldvf7t9g7keuu7.apps.googleusercontent.com"
                                 data-login_uri="http://localhost/TCC/login.php"
                                 data-auto_prompt="false">
                            </div>
                            <div class="g_id_signin"
                                 data-type="standard"
                                 data-shape= "circular"
                                 data-theme="outline"
                                 data-text="signin_with"
                                 data-size="large">
                            </div>
                        </li>
                    </ul>
                </div>
                <p class="descriçao segunda-descriçao">Ou use seu Email para se registrar</p>
                <form action="login.php" method="POST" class="form">
                    <label class="label-input" for="nome">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" name="nome" placeholder="Name">
                    </label>
                    <label class="label-input" for="email">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="email" placeholder="Email" required>
                    </label>
                    <label class="label-input" for="senha">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha" placeholder="Password">
                    </label>
                    <button class="btn btn2" name="submit" value="register">Registrar-se</button>
                </form>
            </div>
        </div>
        <div class="content second-content">
            <div class="first-column">
                <h2 class="titulo title1"></h2>
                <p class="paragrafo paragrafo1">Ou então crie uma conta</p>
                <button id="signup" class="btn btn1">Criar</button>
            </div>
            <div class="second-column">
                <h2 class="titulo title2">Faça login</h2>
                <div class="rede-social">
                    <ul class="list-rede-social">
                       
                            <div id="g_id_onload"
                                  data-client_id="336160376343-9mr7fguersf0dvmvcbldvf7t9g7keuu7.apps.googleusercontent.com"
                                 data-login_uri="http://localhost/TCC/login.php"
                                 data-auto_prompt="false">
                            </div>
                            <form action="index2.php" method="POST" id="google-signin-form">
        <input type="hidden" name="credential" id="google-signin-credential">
    </form>
                            <div class="g_id_signin"
                                 data-type="standard"
                                 data-shape="circular"
                                 data-theme="outline"
                                 data-text="signin_with"
                                 data-size="large">
                            </div>
                        </li>
                    </ul>
                </div>
                <p class="descriçao segunda-descriçao">Ou use seu email para entrar</p>
                <form action="login.php" method="POST" class="form" id="login-sessao">
                    <label class="label-input" for="email-login">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="email-login" placeholder="Email" required>
                    </label>
                    <label class="label-input" for="senha-login">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha-login" placeholder="Password">
                    </label>
                    <a class="password" href="esqueceusenha.php">Esqueceu sua senha?</a>
                    <button class="btn btn2" name="submit" value="login">Entrar</button>
                    
                </form>
                
            </div>
        </div>
    </div>
    
    <script src="index.js"></script>
</body>
</html>
