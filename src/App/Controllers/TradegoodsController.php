<?php

namespace App\Controllers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class TradegoodsController
{

    protected $tradegoodsService;

    public function __construct($service)
    {
        $this->tradegoodsService = $service;
    }

    public function getAll()
    {
        return new JsonResponse($this->tradegoodsService->getAll());
    }

    public function get($id, Request $request)
    {
        $this->tradegoodsService->getOne($id);
        return new JsonResponse($this->tradegoodsService->getOne($id));   
     }

    public function save(Request $request)
    {

        $tradegood = $this->getDataFromRequest($request);
        return new JsonResponse(array("id" => $this->tradegoodsService->save($tradegood)));

    }

    public function update($id, Request $request)
    {
        $tradegood = $this->getDataFromRequest($request);
        $this->tradegoodsService->update($id, $tradegood);
        return new JsonResponse($tradegood);

    }

    public function delete($id)
    {

        return new JsonResponse($this->tradegoodsService->delete($id));

    }

    public function getDataFromRequest(Request $request)
    {
        return $tradegood = array(
            "tradegood" => $request->request->get("tradegood")
        );
    }
}
