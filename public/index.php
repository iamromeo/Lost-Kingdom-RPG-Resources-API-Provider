<?php 

require_once __DIR__.'/../vendor/autoload.php'; 
require_once __DIR__.'/../config.php'; 
require_once __DIR__.'/../libs/functions.php'; 


$app = new Silex\Application(); 

// Global Variables and Components
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


// Environment
$app['debug'] = true; // Development only
$environment = getenv('location');


// Registration and Configuration of components
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

// Database Connection
if ( $environment == "local" ) {
    $app->register(new Silex\Provider\DoctrineServiceProvider(), array(
        'dbs.options' => array (
            'mysql_read' => array(
                'driver'    => 'pdo_mysql',
                'host'      => 'localhost',
                'dbname'    => 'scotchbox',
                'user'      => 'root',
                'password'  => 'root',
                'charset'   => 'utf8mb4',
            ),
        ),
    ));
} else {
    $app->register(new Silex\Provider\DoctrineServiceProvider(), array(
        'dbs.options' => array (
            'mysql_read' => array(
                'driver'    => 'pdo_mysql',
                'host'      => $db_host,
                'dbname'    => $db_name,
                'user'      => $db_user,
                'password'  => $db_password,
                'charset'   => 'utf8mb4',
            ),
        ),
    ));
}




// Global Twig Variables
$app["twig"]->addGlobal("version", "0.1");

// Mounting Controllers
$app->mount('/api', include '../controllers/api.php');
$app->mount('/secure', include '../controllers/admin.php');


$app->run(); 
