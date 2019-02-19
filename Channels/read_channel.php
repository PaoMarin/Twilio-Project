<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md

require  'C:/xampp/htdocs/Twilio_Project/vendor/autoload.php';

use Twilio\Rest\Client;

// Find your Account Sid and Auth Token at twilio.com/console
$sid = "ACf8d3619e2650cb1046800b000466f219";
$token = "0149cd1c19766a7e2e64206aca54d5e7";
$twilio = new Client($sid, $token);

$channels = $twilio->chat->v2->services("ISee610ed3920a4a5086a2d1cec428be0e")
                             ->channels->read();
?>

<!-- Muestra la interfaz de la pagina principal del carrito de compra !-->
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
        <th><a href="/Twilio_Project/channels/create_channel.php">New Channel</a></th>
      </tr>
      <?php foreach ($channels as $record){ ?>
        <tr>
          <td><?php echo ($record->sid) ?></td>
          <td><?php echo ($record->friendlyName) ?></td>
          <td> <a href='/Twilio_Project/channels/edit_channel.php?id= <?php echo ($record->sid) ?>&name= <?php echo ($record->friendlyName) ?>'>Edit</a>
          <a href='/Twilio_Project/channels/delete_channel.php?id= <?php echo ($record->sid) ?>'>Delete</a> 
          </td>
          <?php } ?> 
        </tr>
    </table>
  </div>
</body>
</html>
