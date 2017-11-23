<?php

use Slim\Http\Request;
use Slim\Http\Response;


// Retrieve all pizza
$app->get('/pizzas', function ($request, $response, $args) {
	$sth = $this->db->prepare("SELECT * FROM pizza ORDER BY id");
	$sth->execute();
	$pizzas = $sth->fetchAll();
	return $this->response->withJson($pizzas);
});

// Retrieve pizza with id 
$app->get('/pizza/[{id}]', function ($request, $response, $args) {
	$sth = $this->db->prepare("SELECT * FROM pizza WHERE id=:id");
	$sth->bindParam("id", $args['id']);
	$sth->execute();
	$pizza = $sth->fetchObject();
	return $this->response->withJson($pizza);
});

// Add a new pizza
$app->post('/pizza', function ($request, $response) {
	$input = $request->getParsedBody();
	$sql = "INSERT INTO pizza (name, code, description) VALUES (:name, :code, :description)";
	$sth = $this->db->prepare($sql);
	$sth->bindParam("name", $input['name']);
	$sth->bindParam("code", $input['code']);
	$sth->bindParam("description", $input['description']);
	$sth->execute();
	$input['id'] = $this->db->lastInsertId();
	return $this->response->withJson($input);
});
	
// Delete pizza with given id
$app->delete('/pizza/[{id}]', function ($request, $response, $args) {
	$sth = $this->db->prepare("DELETE FROM pizza WHERE id=:id");
	$sth->bindParam("id", $args['id']);
	$sth->execute();
	return $this->response->withJson('succeed');
});

// Update pizza with given id
$app->put('/pizza/[{id}]', function ($request, $response, $args) {
	$input = $request->getParsedBody();
	$sql = "UPDATE pizza SET name=:name, code=:code, description=:description WHERE id=:id";
	$sth = $this->db->prepare($sql);
	$sth->bindParam("id", $args['id']);
	$sth->bindParam("name", $input['name']);
	$sth->bindParam("code", $input['code']);
	$sth->bindParam("description", $input['description']);
	$sth->execute();
	$input['id'] = $args['id'];
	return $this->response->withJson($input);
});
