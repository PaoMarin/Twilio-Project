<?php
// required headers


require  'C:/xampp/htdocs/Twilio_Project/vendor/autoload.php';

 
use \Twilio\Rest\Client;

$sid = "ACf8d3619e2650cb1046800b000466f219";
$token = "0149cd1c19766a7e2e64206aca54d5e7";

$twilio = new Client($sid, $token);
 

$service = $twilio->chat->v2->services
                            ->create("Service");
                            print_r($service->friendlyName);
        // set response code - 201 created
       // http_response_code(201);
 
        // tell the user
       // echo json_encode(array("message" => "Service was created."));

?>

