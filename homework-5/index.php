<?php

header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');

$uriArray = explode("/", $uri);

if ($uriArray[1] === 'mine' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $games = [
        [
           'Name' => 'Cyber Nexus',
           'Price' => '$12.99',
           'Type' => 'Digital' 
        ],
        [
            'Name' => 'Nomad',
            'Price' => '$15.99',
            'Type' => 'Physical' 
         ],
         [
            'Name' => 'With Us 2',
            'Price' => '$21.99',
            'Type' => 'Physical' 
         ],
         [
            'Name' => 'Side Mecha',
            'Price' => '$19.99',
            'Type' => 'Digital' 
         ],
         [
            'Name' => 'Run 3',
            'Price' => '$52.99',
            'Type' => 'Physical' 
         ],
        ];

    echo json_encode($games);
    exit();
}
if ($uriArray[1] === 'form' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $response = [
        'message' => 'Succesfully Submitted'
    ];

    echo json_encode($response);
    exit();
}
?>