<?php

namespace App\Controllers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class TradegoodcategoriesController
{

    protected $tradegoodcategorycategoriessService;

    public function __construct($service)
    {
        $this->TradegoodcategoriessService = $service;
    }

    public function getAll()
    {
        return new JsonResponse($this->TradegoodcategoriessService->getAll());
    }

    public function get($id, Request $request)
    {
        $this->TradegoodcategoriessService->getOne($id);
        return new JsonResponse($this->TradegoodcategoriessService->getOne($id));   
     }

    public function save(Request $request)
    {

        $tradegoodcategory = $this->getDataFromRequest($request);
        return new JsonResponse(array("id" => $this->TradegoodcategoriessService->save($tradegoodcategory)));

    }

    public function update($id, Request $request)
    {
        $tradegoodcategory = $this->getDataFromRequest($request);
        $this->TradegoodcategoriessService->update($id, $tradegoodcategory);
        return new JsonResponse($tradegoodcategory);

    }

    public function delete($id)
    {

        return new JsonResponse($this->TradegoodcategoriessService->delete($id));

    }

    public function getDataFromRequest(Request $request)
    {
        return $tradegoodcategory = array(
            "tradegoodcategory" => $request->request->get("tradegoodcategory")
        );
    }
}
