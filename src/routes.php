<?php

use Slim\Http\Request;
use Slim\Http\Response;


// API group
$app->group('/api', function () use ($app) {
    // Version group
    $app->group('/v1', function () use ($app) {
 $app->get('/pizzas', 'getPizzas');
 $app->get('/pizza/{id}', 'getPizza');
 $app->post('/create', 'addPizza');
 $app->put('/update/{id}', 'updatePizza');
 $app->delete('/delete/{id}', 'deletePizza');
 });
});
