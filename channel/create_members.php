<?php

//Require para las carpetas de Twilio que se necesita para las funcionalidades
require  'C:/xampp/htdocs/Twilio_Project/vendor/autoload.php';

use Twilio\Rest\Client;

// sID y Token proporcionados por el Web Service
$sid = "ACf8d3619e2650cb1046800b000466f219";
$token = "0149cd1c19766a7e2e64206aca54d5e7";
$twilio = new Client($sid, $token);

//Captura la variable del canal
$id_channel = $_GET['id'];


//Se valida que el metoodo es POST, capture la variable del input para luego llamar a la funcion de twilio para crear un miembro del canal.
if($_SERVER['REQUEST_METHOD'] == 'POST'){  
    $name_member = $_POST['nickname'];
    $member = $twilio->chat->v2->services("ISee610ed3920a4a5086a2d1cec428be0e")
                           ->channels($id_channel)
                           ->members
                           ->create($name_member);
                           echo "<script> alert('Created Member');
                           window.location= '/Twilio_Project/channel/read_messages.php?channel=$id_channel&member=$name_member'
                    </script>";

}   
?> 
<!-- Muestra la interfaz de crear un miembro en el canal !-->
<!DOCTYPE html>
<html>
<head>
	<?php include '../shared/menu.php'; ?>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<h3>Add a member to a channel</h3>
	<form method="POST">
		<label>Enter your sid:</label>
		<input type="text" name="sid" required autofocus value="<?php echo $sid ?>">
		<label>And a Nickname: Please!</label>
		<input type="text" name="nickname" required autofocus value="Example: Joskamarin">
		<input type="submit" value="Save">
		<a href='/Twilio_Project/channel/get_channel.php'>Back</a>
	</form>
</body>
</html>