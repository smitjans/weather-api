<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/weather', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    

    $query = $this->db->prepare("SELECT * FROM Weather");
    $query->execute();
    $data =  $query->fetchAll();

    return $response->withJson($data);
    // Render index view
    //return $this->renderer->render($response, 'index.phtml', $args);
});
