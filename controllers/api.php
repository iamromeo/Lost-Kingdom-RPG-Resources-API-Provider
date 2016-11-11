<?php

// Global Variables and Components
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$api = $app['controllers_factory'];

$api->get('/tradegood', function (Request $request) use ($app) {
    
    $sql = "SELECT * FROM tradegoods";
    $stmt = $app['db']->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();

    return $app->json($results);
});

$api->get('/category', function (Request $request) use ($app) {
    
    $sql = "SELECT * FROM tradegood_categories";
    $stmt = $app['db']->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();

    return $app->json($results);
});


return $api;