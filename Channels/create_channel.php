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

   //Se valida si el request es "post", captura los datos ingresados a las variables y se crea el canal en la funcionalidad de Twilio
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['nombre'];
    $channel = $twilio->chat->v2->services("ISee610ed3920a4a5086a2d1cec428be0e")
                            ->channels
                            ->create(array("friendlyName" => $name));
                            
        echo "<script> alert('Created Channel');
                     window.location= '/Twilio_Project/channels/read_channel.php?name=$name'
              </script>";
  }
?>
<!-- Muestra la interfaz de crear un canal !-->
<!DOCTYPE html>
<html>
<head>
  <?php include '../shared/menu.php'; ?>
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
  <div class="container">
    <h3 align="center">New Channel </h3>
    <form method="POST">
      <table class="table table-striped">
        <tr>
          <td>
            <label>Channel:</label>
          </td>
          <td><input type="text" name="nombre" required autofocus></td>
        </tr>
        <tr><td><input type="submit" value="Save">
      <a href='/Twilio_Project/channels/read_channel.php'>Back</a></td></tr>
    </form>
</div>
</body>
</html>
