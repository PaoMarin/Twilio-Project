<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md

//Require para las carpetas de Twilio que se necesita para las funcionalidades
require  'C:/xampp/htdocs/Twilio_Project/vendor/autoload.php';

use Twilio\Rest\Client;

 //Captura en una variable el id y el nombre del canal
 $id = $_GET['id'];
 $name = $_GET['name'];

// sID y Token proporcionados por el Web Service
$sid = "ACf8d3619e2650cb1046800b000466f219";
$token = "0149cd1c19766a7e2e64206aca54d5e7";
$twilio = new Client($sid, $token);

//Se valida que el metoodo es POST, capture la variable del input para luego llamar a la funcion de twilio para editar el canal.
          if($_SERVER['REQUEST_METHOD'] == 'POST'){  
              $nameupdate = $_POST['nombre'];
              $channel = $twilio->chat->v2->services("ISee610ed3920a4a5086a2d1cec428be0e")->channels($id)
                            ->update(array("friendlyName" => $nameupdate));
                              echo "<script> alert('Updated Channel');
                              window.location= '/Twilio_Project/channels/read_channel.php'
                                    </script>";
          }
                            
                            
?> 
<!-- Muestra la interfaz de editar el canal !-->
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
        
