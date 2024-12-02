<?php
session_start();
require 'config.php';

if (isset($_GET['txn_id']) && isset($_GET['payer_id'])) {
    $txn_id = $_GET['txn_id'];
    $payer_id = $_GET['payer_id'];
    $usuario_id = $_SESSION['usuario_id'];
    $preco = $_GET['mc_gross'];
    $status_pagamento = 'pago';
    
    
    $data_expiracao = null; 

    if ($preco == "2.99") {
        $data_expiracao = date('Y-m-d', strtotime('+1 day')); // Acesso único
    } elseif ($preco == "5.99") {
        $data_expiracao = date('Y-m-d', strtotime('+30 days')); // Acesso mensal
    } elseif ($preco == "59.99") {
        $data_expiracao = date('Y-m-d', strtotime('+365 days')); // Acesso anual
    }

    
    $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
    
    // Montando os dados para validar o pagamento
    $ipn_data = array(
        'cmd' => '_notify-validate',
        'txn_id' => $txn_id,
        'payer_id' => $payer_id,
        'mc_gross' => $preco,
    );

    // Criando o corpo da requisição (campo POST)
    $req = 'cmd=_notify-validate&' . http_build_query($ipn_data);

    // Inicializa cURL para fazer a requisição ao PayPal
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $paypal_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    
    if ($response == "VERIFIED" && $data_expiracao) {
        
        $sql_pagamento = "INSERT INTO pagamentos (usuario_id, status, data) VALUES ('$usuario_id', '$status_pagamento', NOW())";
        $sql_acesso = "UPDATE usuarios SET data_expiracao = '$data_expiracao' WHERE id = '$usuario_id'";
        
        if (mysqli_query($conexao, $sql_pagamento) && mysqli_query($conexao, $sql_acesso)) {
            ?>
            <div class="message-box">
                <h1>Pagamento confirmado!</h1>
                <a href="pag_realizado.html">Continuar</a>
              
            </div>
            <?php
        } else {
            ?>
            <div class="message-box">
                <h1 class="error">Erro ao processar pagamento: <?php echo mysqli_error($conexao); ?></h1>
                <a href="acessocompleto.php">Tentar novamente</a>
                <a href="index2.php">Voltar ao início</a>
            </div>
            <?php
        }

    } else {
        // Caso a resposta do PayPal não seja "VERIFIED"
        ?>
        <div class="message-box">
            <h1 class="error">Erro ao confirmar pagamento.</h1>
            <a href="index2.php">Tentar novamente</a>
        </div>
        <?php
    }









} else {
    ?>
    <div class="message-box">
                <h1>Pagamento confirmado!</h1>
                <a href="pag_realizado.html">Continuar</a>
              
            </div>
    <?php
}
?>
