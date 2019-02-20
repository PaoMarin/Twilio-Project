<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md

require  'C:/xampp/htdocs/Twilio_Project/vendor/autoload.php';

use Twilio\Rest\Client;

// Find your Account Sid and Auth Token at twilio.com/console
$sid = "ACf8d3619e2650cb1046800b000466f219";
$token = "0149cd1c19766a7e2e64206aca54d5e7";
$twilio = new Client($sid, $token);

$id_channel = $_GET['channel'];
$member = $_GET['member'];

$messages = $twilio->chat->v2->services("ISee610ed3920a4a5086a2d1cec428be0e")
                             ->channels($id_channel)
                             ->messages
                             ->read();
                          

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
    <h3 align="center">Messages </h3>
    <br>
    <table class="table table-striped">
      <tr>
        <th>Nickname</th>
        <th>Date and Time</th>
        <th>Message</th>
        <th><a href='/Twilio_Project/channel/send_messages.php?channel=<?php echo ($id_channel)?>&member=<?php echo ($member)?>'>New Message</a></th>
      </tr>
      <?php foreach ($messages as $record){ ?>
        <tr>
          <td><?php echo ($record->from) ?></td>
          <td><time date_create_from_format=<?php echo ($record->dateCreated) ?>></td>
          <td><?php echo ($record->body) ?></td>
          <?php } ?> 
        </tr>
    </table>
  </div>
</body>
</html>
