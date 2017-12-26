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
	$mail->Host = " "; // SMTP a utilizar. Por ej. mtp.elserver.com
	$mail->Username = " "; // Correo completo a utilizar
	$mail->Password = " "; // Contraseña
	$mail->Port = 25; // Puerto a utilizar

	//Con estas pocas líneas iniciamos una conexión con el SMTP. Lo que ahora deberíamos hacer, es configurar el mensaje a enviar, el //From, etc.
	$mail->From = " "; // Desde donde enviamos (Para mostrar, correo)
	$mail->FromName = " Nombre ";

	//Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: “From: Nombre <correo@dominio.com>”) de //correo.
	$mail->IsHTML(true); // El correo se envía como HTML
	$mail->Subject = " Sujeto "; // Este es el titulo del email.
	$mail->msgHTML(file_get_contents('template.html'), dirname(__FILE__)); // Mensaje a enviar
	$mail-> AddAddress($email);

	$exito = $mail->Send();

?>
