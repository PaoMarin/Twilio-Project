<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md

require  'C:/xampp/htdocs/Twilio_Project/vendor/autoload.php';

use Twilio\Rest\Client;

// Find your Account Sid and Auth Token at twilio.com/console
$sid = "ACf8d3619e2650cb1046800b000466f219";
$token = "0149cd1c19766a7e2e64206aca54d5e7";
$twilio = new Client($sid, $token);

$id_channel = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){  
    $sid_member = $_POST['sid'];
    $member = $twilio->chat->v2->services("ISee610ed3920a4a5086a2d1cec428be0e")
                           ->channels($id_channel)
                           ->members
                           ->create($sid_member);
                           echo "<script> alert('Created Member');
                           window.location= '/Twilio_Project/channel/read_messages.php?channel=$id_channel'
                    </script>";

}   
?> 
<!-- Muestra la interfaz de editar el carrito de compra !-->
<!DOCTYPE html>
<html>
<head>
  <?php include '../shared/menu.php'; ?>
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
  <h3>Add a member to a channel</h3>
    <form method="POST">
    <label>Enter your sid. Please!</label>
    <input type="text" name="sid" required autofocus value="<?php echo $sid ?>">
    <input type="submit" value="Save">
    <a href='/Twilio_Project/channel/get_channel.php'>Back</a>
  </form>
</body>
</html>