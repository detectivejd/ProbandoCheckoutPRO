<?php
    require __DIR__ . '/extension/vendor/autoload.php';
    require __DIR__ . '/correo/vendor/autoload.php';
    use MercadoPago;
    use PHPMailer;
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken('TEST-6451616915373368-042720-2a5cde5a2a4020c3baf46fc94be461db-199806132');
    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();
    $preference->back_urls = array(
        "success" => "http://localhost/php/CheckoutPRO2/success.php",
        "failure" => "http://localhost/php/CheckoutPRO2/failure.php",
        "pending" => "http://localhost/php/CheckoutPRO2/pending.php"
    );
    $preference->auto_return = "approved";
    //$preferences->notification_url = "https://webhook.site/86aa7bb4-3099-42bb-aaa8-93605bef9056";
    $item = new MercadoPago\Item();
    $item->title = $_POST["txtnombre"];
    $item->quantity = 1;
    $item->unit_price = floatval($_POST["txtmonto"]);
    $preference->items = array($item);
    $preference->save();        
    if(isset($_POST["btnpagar"])){                
        // Crea un ítem en la preferencia
        header("Location:https://www.mercadopago.com.uy/checkout/v1/payment/redirect/86aa7bb4-3099-42bb-aaa8-93605bef9056/payment-option-form/?source=link&preference-id=".$preference->id);
        //https://www.mercadopago.com.uy/checkout/v1/payment/redirect/f2cf6b9b-37a2-4e86-b5e1-eed27fdfea5e/payment-option-form/?source=link&preference-id=521673534-0cf9e851-8e08-407d-9a6b-ba313ce51b08&p=7c378b672e4336d22bb3e4beb33c7e93#/        
    } else if(isset($_POST["btnlink"])){
        //Crear una instancia de PHPMailer
        $mail = new \PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 2;  // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true;  // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
        $mail->SMTPAutoTLS = false;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username   = "serverjd21@gmail.com";
        //Introducimos nuestra contraseña de gmail
        $mail->Password   = "j1990d21";
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        //Definimos el remitente (dirección y, opcionalmente, nombre)
        $mail->SetFrom('corajejd@gmail.com', 'Juandy Ocampo');
        $mail->AddAddress('julialiliamferreira@gmail.com', 'El Destinatario');
        //Definimos el tema del email
        //$mail->Subject = 'Esto es un correo de prueba';
        $body = "";
        $body .= "Hola has realizado las siguientes compras por mercado pago: \n\n";
        foreach($preference->items as $item) {
            $body .= $item->quantity." ".$item->title." por: $". ($item->unit_price * $item->quantity)."\n";
        }
        $body .= "\n";
        $body .= "Puede pagar a través de este link:\n";
        $body .= "https://www.mercadopago.com.uy/checkout/v1/payment/redirect/86aa7bb4-3099-42bb-aaa8-93605bef9056/payment-option-form/?source=link&preference-id=".$preference->id;
        $mail->Body = $body;
//Enviamos el correo
        if(!$mail->Send()) {
            echo "Error: " . $mail->ErrorInfo;
            echo "<br /><br /><a href='index.php'>Volver</a>";
        } else {
            echo "Enviado!";
            echo "<br /><br /><a href='index.php'>Volver</a>";
        }
    }

