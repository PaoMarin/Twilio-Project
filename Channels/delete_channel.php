<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md

//Require para las carpetas de Twilio que se necesita para las funcionalidades
require  'C:/xampp/htdocs/Twilio_Project/vendor/autoload.php';

use Twilio\Rest\Client;

//Captura la variable del ID del canal
$id = $_GET['id'];

// sID y Token proporcionados por el Web Service
$sid = "ACf8d3619e2650cb1046800b000466f219";
$token = "0149cd1c19766a7e2e64206aca54d5e7";
$twilio = new Client($sid, $token);

//Llamar a la funcionalidad en Twilio encargada de eliminar los canales exitentes
if($twilio->chat->v2->services("ISee610ed3920a4a5086a2d1cec428be0e")
->channels($id)
->delete() == true){
    
     echo "<script>
                alert('Deleted Channel');
                window.location= '/Twilio_Project/channels/read_channel.php'
    </script>";
}

?> 