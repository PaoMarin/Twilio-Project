<?php


//Require para las carpetas de Twilio que se necesita para las funcionalidades
require  'C:/xampp/htdocs/Twilio_Project/vendor/autoload.php';

 
use \Twilio\Rest\Client;

// sID y Token proporcionados por el Web Service
$sid = "ACf8d3619e2650cb1046800b000466f219";
$token = "0149cd1c19766a7e2e64206aca54d5e7";
$twilio = new Client($sid, $token);
 
//Llamar a la funcionalidad en Twilio encargada de crear el servicio.
$service = $twilio->chat->v2->services
                            ->create("Service");
                            print_r($service->friendlyName);
       
?>

