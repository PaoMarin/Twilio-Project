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

//Llamar a la funcionalidad en Twilio encargada de leer los canales exitentes
$channels = $twilio->chat->v2->services("ISee610ed3920a4a5086a2d1cec428be0e")
                             ->channels->read();
?>

<!-- Muestra la interfaz de la pagina principal del Canal !-->
<!DOCTYPE html>
<html>
<head>
  <?php include '../shared/menu.php'; ?>
  <link rel="stylesheet" type="text/css" href="../style.css">
  <meta charset="utf-8">
</head>
<body>
  <div class="container">
    <h3 align="center">Channels</h3>
    <br>
    <table class="table table-striped">
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th> </th>
      </tr>
      <?php foreach ($channels as $record){ ?>
        <tr>
          <td><?php echo ($record->sid) ?></td>
          <td><?php echo ($record->friendlyName) ?></td>
          <td> <a href='/Twilio_Project/channel/create_members.php?id= <?php echo ($record->sid)  ?>'>Join</a>        
          </td>
          <?php } ?> 
        </tr>
    </table>
  </div>
</body>
</html>
