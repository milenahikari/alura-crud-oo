<?php
session_start();
$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

require_once("PHPMailerAutoload.php");
//Criar email a ser enviado
$mail = new PHPMailer();

//Falo que vou usar SMTP
$mail->isSMTP();

//Seto o host para o host SMTP
$mail->Host = 'smtp.gmail.com'; 

//Seto a porta
$mail->Port = 587;

//Declaro o protocolo
$mail->SMTPSecure = 'tls';

//Declaro autenticação
$mail->SMTPAuth = true;

//Usuario que dispara o email
$mail->Username = "alura@gmail.com";

//Senha
$mail->Password = "123456";

//Quem envia o email
$mail->setFrom($nome, "Alura Curso PHP e MySQL");

//Quem recebe o email
$mail->addAddress("alura@gmail.com");

//Título da msg
$mail->Subject = "Email de contato da loja";

//Setando msg em HTML
$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");

//Setando msg em texto puro
$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";

if($mail->send()) {
    $_SESSION["success"] = "Mensagem enviada com sucesso";
    header("Location: index.php");
} else {
    $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
    header("Location: contato.php");
}
die();