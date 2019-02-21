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


//Llamar a la funcionalidad en Twilio encargada de borrar el servicio.
$twilio->chat->v2->services("IS3c98d64256144beca6a42fa25afc261a")
->delete();