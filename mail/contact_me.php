<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Nenhum dado fornecido!";
	return false;
   }

$name = strip_tags(htmlspecialchars($_POST['name']));
$company = strip_tags(htmlspecialchars($_POST['company']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = 'contato@mpmanutencoes.com.br'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Formulario de contato do site:  $name";
$email_body = "Voce recebeu uma nova mensagem do formulario de contato do seu site.\n\n"."Aqui estao os detalhes:\n\nNome: $name\n\nEmpresa: $company\n\nEmail: $email_address\n\nTelefone: $phone\n\nMensagem:\n$message";
$headers = "From: naoresponder@mpmanutencoes.com.br\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Responder a: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>
