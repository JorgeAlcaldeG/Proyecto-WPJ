<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
$asunto = $_POST["asunto"];
$mensaje = $_POST["mensaje"];
$num = $_POST["numcorreo"];
$fichero = $_FILES['fichero'];
session_start();
$nombre= $_SESSION['nom']." ".$_SESSION['apellido'];
//echo $nombre;
if(empty($asunto) || empty($mensaje) || empty($num)){
    header("Location: ../pantallas/form_mail.php?msg=error&var={$_GET["var"]}");
}
//Create an instance; passing `true` enables exceptions

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'phpmailerproyectoj23@gmail.com';                     //SMTP username
    $mail->Password   = 'asdqwe123ASD';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('phpmailerproyectoj23@gmail.com', $nombre);
    $mail->addAddress('jorge-2806@hotma.ca');
    // for ($i=0; $i<$num; $i++){
    //     $mail->addAddress($_POST[$i]);     //Add a recipient
    // }
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    if($fichero["size"]!=0){
        $mail->addAttachment($fichero["tmp_name"], $fichero["name"]);         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    }

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $mensaje;
    $mail->AltBody = $mensaje;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
