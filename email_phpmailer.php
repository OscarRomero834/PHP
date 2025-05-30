<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'tucorreo@gmail.com';
    $mail->Password = 'tucontraseña';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Destinatarios
    $mail->setFrom('tucorreo@gmail.com', 'Tu Nombre');
    $mail->addAddress('destinatario@example.com');

    // Contenido
    $mail->isHTML(true);
    $mail->Subject = 'Asunto del correo';
    $mail->Body = '<h1>Hola, esto es un correo de prueba</h1>';

    $mail->send();
    echo 'Correo enviado correctamente.';
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
?>