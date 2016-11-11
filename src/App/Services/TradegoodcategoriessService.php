<?php

namespace App\Services;

class TradegoodcategoriessService extends BaseService
{

    public function getAll()
    {
        return $this->db->fetchAll("SELECT * FROM tradegood_categories");
    }

    public function getOne( $id )
    {
        return $this->db->fetchAll("SELECT * FROM tradegood_categories WHERE id = ". $id );
    }

}
