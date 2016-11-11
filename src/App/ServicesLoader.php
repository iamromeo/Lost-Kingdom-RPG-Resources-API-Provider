<?php
namespace App;

use Silex\Application;

class ServicesLoader
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function bindServicesIntoContainer()
    {
        $this->app['tradegoods.service'] = function ( $app ) {
            return new Services\TradegoodsService($this->app["db"]);
        };
        $this->app['tradegoodcategories.service'] = function ( $app ) {
            return new Services\TradegoodcategoriessService($this->app["db"]);
        };


    }
}

