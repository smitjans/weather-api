<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/weather', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    

    $query = $this->db->prepare("SELECT * FROM Weather");
    $query->execute();
    $data =  $query->fetchAll(); //Ritorna una lista di oggetti

    return $response->withJson($data); //Prendo la lista di oggetti e la converto in un json che ritorno
    // Render index view
    //return $this->renderer->render($response, 'index.phtml', $args);
});




$app->get('/weather/[{id}]', function (Request $request, Response $response, array $args) {


	$id = $args['id'];

    

    $query = $this->db->prepare("SELECT * FROM Weather WHERE id=$id");
    $query->bindParam('id', $args['id']);
    $query->execute();
    $data =  $query->fetchAll(); //Ritorna una lista di oggetti

    return $response->withJson($data); //Prendo la lista di oggetti e la converto in un json che ritorno
});


$app->post('/weather', function (Request $request, Response $response, array $args) {


	$id = $args['id'];

	$query = $this->db->prepare("INSERT INTO Weather (weather, date, temperature)
            VALUES (:weather, :date, :temperature)");

 		
 		$input = $request->getParsedBody();
        $query->bindParam('weather', $input['weather']);
        $query->bindParam('date', $input['date']);
        $query->bindParam('temperature', $input['temperature']);

        $query->execute();


		$query = $this->db->prepare("SELECT * FROM Weather");
		$query->execute();
        $data =  $query->fetchAll();




        return $response->withJson($data);




    

    $query = $this->db->prepare("SELECT * FROM Weather WHERE id=$id");
    $query->execute();
    $data =  $query->fetchAll(); //Ritorna una lista di oggetti

    return $response->withJson($data); //Prendo la lista di oggetti e la converto in un json che ritorno
});


$app->put('/weather/[{id}]', function (Request $request, Response $response, array $args) {


	$id = $args['id'];

	$query = $this->db->prepare("UPDATE Weather set weather=:weather, date=:date, temperature=:temperature where id=:id");

 		
 		$input = $request->getParsedBody();
        $query->bindParam('weather', $input['weather']);
        $query->bindParam('date', $input['date']);
        $query->bindParam('temperature', $input['temperature']);
        $query->bindParam('id', $args['id']);

        $query->execute();


		$query = $this->db->prepare("SELECT * FROM Weather");
		$query->execute();
        $data =  $query->fetchAll();




        return $response->withJson($data);




    

    $query = $this->db->prepare("SELECT * FROM Weather WHERE id=$id");
    $query->execute();
    $data =  $query->fetchAll(); //Ritorna una lista di oggetti

    return $response->withJson($data); //Prendo la lista di oggetti e la converto in un json che ritorno
});



$app->delete('/weather/[{id}]', function (Request $request, Response $response, array $args) {


	$id = $args['id'];

    

    $query = $this->db->prepare("DELETE FROM Weather WHERE id=$id");
    $query->execute();

    $query = $this->db->prepare("SELECT * FROM Weather");
	$query->execute();
    $data =  $query->fetchAll(); //Ritorna una lista di oggetti

    return $response->withJson($data); //Prendo la lista di oggetti e la converto in un json che ritorno
});


