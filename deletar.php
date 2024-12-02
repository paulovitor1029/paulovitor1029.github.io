<?php
session_start();
require_once 'config.php'; 


if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_SESSION['email-login'])) {
    $email = $_SESSION['email-login'];
    
    
    $query = "DELETE FROM usuarios WHERE email = ?";
    $stmt = mysqli_prepare($conexao, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
           
            session_unset();
            session_destroy();
            header("Location: login.php");
            exit();
        } else {
            echo "Erro ao deletar a conta.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erro ao preparar a consulta: " . mysqli_error($conexao);
    }
}
?>
