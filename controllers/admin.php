<?php

// Global Variables and Components
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$admin = $app['controllers_factory'];

$admin->get('dashboard', function (Request $request) use ($app) {
    return 'hello'; 
})->bind('dashboard');



return $admin;