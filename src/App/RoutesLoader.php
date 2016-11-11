<?php
namespace App;

use Silex\Application;

class RoutesLoader
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->instantiateControllers();

    }

    private function instantiateControllers()
    {
        $this->app['tradegoods.controller'] = function($app) {
            return new Controllers\TradegoodsController($this->app['tradegoods.service']);
        };
        $this->app['tradegoodcategoriess.controller'] = function($app) {
            return new Controllers\TradegoodcategoriesController($this->app['tradegoodcategories.service']);
        };
    }

    public function bindRoutesToControllers()
    {
        $api = $this->app["controllers_factory"];

        $api->get('/tradegoods', "tradegoods.controller:getAll");
        $api->get('/tradegoods/{id}', "tradegoods.controller:get");

        // $api->post('/tradegoods', "tradegoods.controller:save");
        // $api->put('/tradegoods/{id}', "tradegoods.controller:update");
        // $api->delete('/tradegoods/{id}', "tradegoods.controller:delete");
        
        $api->get('/tradegoodcategories', "tradegoodcategoriess.controller:getAll");
        $api->get('/tradegoodcategories/{id}', "tradegoodcategoriess.controller:get");

        $this->app->mount($this->app["api.endpoint"].'/'.$this->app["api.version"], $api);
    }
}

