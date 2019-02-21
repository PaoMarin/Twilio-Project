<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md

//Require para las carpetas de Twilio que se necesita para las funcionalidades
require  'C:/xampp/htdocs/Twilio_Project/vendor/autoload.php';

use Twilio\Rest\Client;

// sID y Token proporcionados por el Web Service
$sid = "ACf8d3619e2650cb1046800b000466f219";
$token = "0149cd1c19766a7e2e64206aca54d5e7";
$twilio = new Client($sid, $token);

//Captura la variable del canal y el nombre del miembro
$id_channel = $_GET['channel'];
$member = $_GET['member'];


 //Se valida si el request es "post", captura los datos ingresados a las variables y llama a la funcionalidad de crear el mensaje en el canal
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $body_message = $_POST['body'];
    //Capturar la fecha del sistema
    $date = new DateTime('now');
    

    $message = $twilio->chat->v2->services("ISee610ed3920a4a5086a2d1cec428be0e")
                            ->channels($id_channel)
                            ->messages
                            ->create(array("from"=> $member,"dateCreated"=> $date, "body" => $body_message ));
                            
        echo "<script> alert('Created Message');
                     window.location= '/Twilio_Project/channel/read_messages.php?channel=$id_channel&member=$member'
              </script>";
  }
?>
<!-- Muestra la interfaz de crear el mensaje !-->
<!DOCTYPE html>
<html>
<head>
  <?php include '../shared/menu.php'; ?>
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
  <div class="container">
    <h3 align="center">New Message</h3>
    <form method="POST">
      <table class="table table-striped">
        <tr>
          <td>
            <label>Message:</label>
          </td>
          <td><input type="text" size="15" maxlength="30" name="nombre" required autofocus></td>
        </tr>
        <tr><td><input type="submit" value="Save">
      <a href='/Twilio_Project/channel/read_messages.php'>Back</a></td></tr>
    </form>
</div>
</body>
</html>
