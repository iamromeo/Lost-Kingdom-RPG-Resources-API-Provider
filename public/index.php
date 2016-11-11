<?php
require_once __DIR__.'/../vendor/autoload.php'; 
require_once __DIR__.'/../libs/functions.php'; 

$app = new Silex\Application();

require_once __DIR__.'/../config.php'; 
require __DIR__ . '/../src/app.php';

$app['http_cache']->run();
