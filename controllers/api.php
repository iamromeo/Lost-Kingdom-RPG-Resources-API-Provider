<?php

// Global Variables and Components
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$api = $app['controllers_factory'];

$api->get('', function (Request $request) use ($app) {
    return true; 
});



return $api;