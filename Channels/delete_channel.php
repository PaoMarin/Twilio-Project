<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md

require  'C:/xampp/htdocs/Twilio_Project/vendor/autoload.php';

use Twilio\Rest\Client;

$id = $_GET['id'];

// Find your Account Sid and Auth Token at twilio.com/console
$sid = "ACf8d3619e2650cb1046800b000466f219";
$token = "0149cd1c19766a7e2e64206aca54d5e7";
$twilio = new Client($sid, $token);


if($twilio->chat->v2->services("ISee610ed3920a4a5086a2d1cec428be0e")
->channels($id)
->delete() == true){
    
     echo "<script>
                alert('Deleted Channel');
                window.location= '/Twilio_Project/channels/read_channel.php'
    </script>";
}

?> 