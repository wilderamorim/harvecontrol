<?php


$response = require __DIR__.'/bootstrap/app.php';


// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);