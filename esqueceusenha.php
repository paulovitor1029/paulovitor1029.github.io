<?php
include_once('config.php');

if (isset($_POST['submit'])) {
    if ($_POST['submit'] == 'enviar') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['novasenha'];

        
        if (empty($nome) || empty($email) || empty($senha)) {
            echo "Por favor, preencha todos os campos.";
            exit();
        }

        // Criptografa a senha
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $query = "UPDATE usuarios SET senha = ? WHERE email = ?";
        $stmt = mysqli_prepare($conexao, $query);
        
        if ($stmt) {
           
            mysqli_stmt_bind_param($stmt, "ss", $senhaHash, $email);
            $result = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            if ($result) {
                echo "Senha atualizada com sucesso.";
                header('Location: login.php');
                exit();
            } else {
                echo "Erro ao atualizar a senha: " . mysqli_error($conexao);
            }
        } else {
            echo "Erro ao preparar a consulta: " . mysqli_error($conexao);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estiloesqueceusenha.css"> 
    <title>Esqueceu a Senha</title>
</head>
<body class="body">
    <div class="formulario">
        <div class="interface">
            <h2 class="titulo">Digite seu email e uma nova senha:</h2>
            <form id="resetForm" method="POST" action="esqueceusenha.php" onsubmit="return validateForm()">
                <input type="text" name="nome" placeholder="Seu nome completo:" required>
                <input type="email" name="email" placeholder="Seu Email:" required>
                <input type="text" id="novasenha" name="novasenha" placeholder="Nova senha:" required>
                <input type="password" id="confirmasenha" name="confirmasenha" placeholder="Digite novamente:" required>
                <div class="btn-enviar"><input type="submit" name="submit" value="enviar"></div>
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            var novasenha = document.getElementById("novasenha").value;
            var confirmasenha = document.getElementById("confirmasenha").value;

            if (novasenha !== confirmasenha) {
                alert("As senhas são diferentes, por favor digite novamente");
                return false; 
            }

            return true; 
        }
    </script>
</body>
</html>
