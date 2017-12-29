<?php
include_once('../libs/PHPMailer/PHPMailer.php');
include_once('../libs/PHPMailer/POP3.php');
include_once('../libs/PHPMailer/SMTP.php');
include_once('../controladores/Controlador_Base.php');
use PHPMailer\PHPMailer\POP3;
use PHPMailer\PHPMailer\PHPMailer;
class Controlador_mail_sender extends Controlador_Base
{
   function enviar($args)
   {
        $FromEmail = $args["FromEmail"];
        $FromAlias = $args["FromAlias"];
        $FromClave = $args["FromClave"];
        $ReplyEmail = $args["ReplyEmail"];
        $ReplyAlias = $args["ReplyAlias"];
        $ToEmail = $args["ToEmail"];
        $ToAlias = $args["ToAlias"];
        $Mensaje = $args["Mensaje"];
        $Asunto = $args["Asunto"];
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = $FromEmail;
        $mail->Password = $FromClave;
        $mail->setFrom( $FromEmail, $FromAlias );
        $mail->addReplyTo( $ReplyEmail, $ReplyAlias );
        $mail->addAddress($ToEmail, $ToAlias);
        $mail->Subject = $Asunto;
        $mail->msgHTML($Mensaje);
        $EstadoEnvio = $mail->send();
        $fecha = date("Y-m-d H:i:s");
        $sql = "INSERT INTO LogMailSender (fecha,FromEmail,FromAlias,ReplyEmail,ReplyAlias,ToEmail,ToAlias,Asunto,Mensaje,EstadoEnvio) VALUES (?,?,?,?,?,?,?,?,?,?);";
        $parametros = array($fecha,$FromEmail,$FromAlias,$ReplyEmail,$ReplyAlias,$ToEmail,$ToAlias,$Asunto,$Mensaje,$EstadoEnvio);
        $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
        if(is_null($respuesta[0])){
            return $EstadoEnvio;
        }else{
            return false;
        }
   }
}