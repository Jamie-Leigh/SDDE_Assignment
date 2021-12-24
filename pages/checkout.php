<?php
use Socketlabs\SocketLabsClient;
use Socketlabs\Message\BasicMessage;
use Socketlabs\Message\EmailAddress;

$serverId = 42107;
$injectionApiKey = "o5N4HwTd6p7L3Bzn9Q8K";

$client = new SocketLabsClient($serverId, $injectionApiKey);

$message = new BasicMessage(); 

$message->subject = "Thank you for your order, ".$_SESSION['user_data']['first_name']."!";
$message->htmlBody = "<html>
                        <body>
                            <h1>Thank you for your order!</h1>
                            <p>We have recieved your order and you can collect your cars from any of our locations.</p>
                            <p>For more information, please visit our FAQ page <a href='https://jamie.uosweb.co.uk/SDDE_Assignment/index.php?p=faq'>here</a></p>
                            <p> Order details: </p>
                            <p> Total price: £".$_SESSION['totalPrice']." </p>
                        </body>
                    </html>";
$message->plainTextBody = "This is the Plain Text Body of my message.";

$message->from = new EmailAddress("jamie@sevent.com");
$message->addToAddress($_SESSION['user_data']['email']);

$response = $client->send($message);
?>

<div class="container">
    <h1 class="mb-4 pb-2">Checkout</h1>
    <p>Thank you for your order</p>
    <p><a class="btn btn-sevent" href="index.php">Click here to go back</a></p>
    </ul>
</div>