<?php

require __DIR__.'/vendor/autoload.php';

use Guzzle\Http\Client;

// create our http client (Guzzle)
$client = new Client('http://localhost:8000', array(
    'request.options' => array(
        'exceptions' => false,
    )
));

$body = array(
  'name' => 'Tesla',
  'title' => 'Mr',
);

$request = $client->post('/api/programmers', NULL, json_encode($body));
$response = $request->send();

echo $response;
echo "\r\n\r\n";


