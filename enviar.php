<?php 

	// Here we get all the information from the fields sent over by the form.
	$name = $_POST['nombre'];
	$email = $_POST['mail'];
	$message = $_POST['comentario'];
	 
	$to = 'arielmbenz@gmail.com';
	$subject = 'the subject';
	$message = 'FROM: '.$name.' Email: '.$email.' Message: '.$message;
	$headers = 'From: arielmbenz@gmail.com' . "\r\n";
	 
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // this line checks that we have a valid email address
		mail($to, $subject, $message, $headers); //This method sends the mail.
		echo "Sus datos han sido recibidos con éxito."; // success message
	} else {
		echo "Se ha producido un error durante el envío de datos.";
	}

?>