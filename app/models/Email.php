<?php

namespace App\models;

use App\Core\App;
use App\models\Model;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email extends Model
{

    public static function enviar($remetente, $destinatario, $conteudo)
    {
        $mail = new PHPMailer(false);
        try {
            //Server settings
            $mail->SMTPDebug = 0;   
            $mail->IsSMTP();
            // // optional
            // // used only when SMTP requires authentication  
            $mail->SMTPAuth = true;
            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->Username   = 'lucasdelimamonteiro@gmail.com';                     // SMTP username
            $mail->Password   = 'nuclear00123';                               // SMTP password
            $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 465;                                    // TCP port to connect to
            //Recipients
            $mail->setFrom($remetente, 'Sistema Concretus');
            $mail->addAddress($destinatario, 'Concretus');     // Add a recipient
            $mail->addAddress($destinatario);               // Name is optional
            $mail->addReplyTo('lucasdelimamonteiro@gmail.com', 'No Reply');
            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = utf8_decode($conteudo['assunto']);
            $mail->Body    = utf8_decode($conteudo['mensagem']);
            $mail->AltBody = utf8_decode($conteudo['mensagem']);
            $mail->send();
        } catch (Exception $e) {
            $e->getMessage();
            echo "A mensagem não pode ser enviada. Erro ocorrido: {$mail->ErrorInfo}";
            die();
        }
        
    }

    public static function gerarToken($tamanho)
    {
        $basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

        $token= "";

        for($count= 0; $tamanho > $count; $count++){

            $token.= $basic[rand(0, strlen($basic) - 1)];
        }

        return $token;
    }

}
