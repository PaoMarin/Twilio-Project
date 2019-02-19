<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require  'C:/xampp/htdocs/Twilio_Project/vendor/autoload.php';

use Twilio\Rest\Client;

 //Captura en una variable el id enviado del index
 $id = $_GET['id'];
 $name = $_GET['name'];

// Find your Account Sid and Auth Token at twilio.com/console
$sid = "ACf8d3619e2650cb1046800b000466f219";
$token = "0149cd1c19766a7e2e64206aca54d5e7";
$twilio = new Client($sid, $token);



          if($_SERVER['REQUEST_METHOD'] == 'POST'){  
            $nameupdate = $_POST['nombre'];
             $channel = $twilio->chat->v2->services("ISee610ed3920a4a5086a2d1cec428be0e")->channels($id)
                            ->update(array("friendlyName" => $nameupdate));
                              echo "<script> alert('Updated Channel');
                              window.location= '/Twilio_Project/channels/read_channel.php'
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
  <h3>Channel Edit</h3>
    <form method="POST">
    <label>Name:</label>
    <input type="text" name="nombre" required autofocus value="<?php echo $name ?>">
    <input type="submit" value="Save">
    <a href='/Twilio_Project/channels/read_channel.php'>Back</a>
  </form>
</body>
</html>
        
