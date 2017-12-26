<?php
require("PHPMailerAutoload.php");
$name=$_POST["name"];
$email=$_POST["email"];

$email = strtolower($email);
	$mail = new PHPMailer();
	//Luego tenemos que iniciar la validación por SMTP:
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->CharSet = 'UTF-8';
	$mail->SMTPDebug = 2; // enables SMTP debug
	//$mail->SMTPSecure = "ssl";
	$mail->Host = "mail.chicleypegacreativo.com"; // SMTP a utilizar. Por ej. mtp.elserver.com
	$mail->Username = "sergio@chicleypegacreativo.com"; // Correo completo a utilizar
	$mail->Password = "sergio1234"; // Contraseña
	$mail->Port = 25; // Puerto a utilizar

	//Con estas pocas líneas iniciamos una conexión con el SMTP. Lo que ahora deberíamos hacer, es configurar el mensaje a enviar, el //From, etc.
	$mail->From = "sergio@chicleypegacreativo.com"; // Desde donde enviamos (Para mostrar)
	$mail->FromName = "Template";

	//Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: “From: Nombre <correo@dominio.com>”) de //correo.
	$mail->IsHTML(true); // El correo se envía como HTML
	$mail->Subject = "¡Información solicitada - Franquicias!"; // Este es el titulo del email.
	$body = 'Template';
	$mail->msgHTML(file_get_contents('template.html'), dirname(__FILE__)); // Mensaje a enviar
	$mail-> AddAddress($email);

	$exito = $mail->Send();

?>
