<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style3.css">
    <title>Pagamento</title>
</head>
<body>
    
</body>
</html>
<?php
session_start();
require 'config.php';
if (!
isset($_SESSION ['email-login']
)
)
{
    header('Location:login.php');
    exit();

}
$usuario_id = $_SESSION ['email-login'];



$paypal_url= "https://www.sandbox.paypal.com/cgi-bin/webscr"; 
$paypal_id= "sb-cjich33330792@business.example.com";
?>

<form action = "<?php echo 
$paypal_url; ?>" method = "post">

<input type="hidden"
name="business" value= "<?php echo 
$paypal_id; ?>">

<input type="hidden"
name="cmd" value ="_xclick">

<input type="hidden"
name="item_name" value= "Acesso completo">

<input type="hidden"
name="item_number" value= "<?php echo 
$usuario_id; ?>"> 
<label for="tipo_acesso">Escolha o tipo de acesso:</label>
    <select name="amount" id="tipo_acesso">
        <option value="2.99">Acesso Único - R$2.99</option>
        <option value="5.99">Acesso Mensal - R$5.99</option>
        <option value="59.99">Acesso Anual - R$59.99</option>
    </select>

<input type="hidden"
name="currency_code" value="BRL">


<input type="hidden"
name="return" value="https://a380-138-204-208-22.ngrok-free.app/TCC/retorno_sucesso.php">

<input type="hidden"
name="cancel_return" value="https://a380-138-204-208-22.ngrok-free.app/TCC/retorno_cancelado.php">


<input type="submit" value= "Pagar com Paypal">
</form> 