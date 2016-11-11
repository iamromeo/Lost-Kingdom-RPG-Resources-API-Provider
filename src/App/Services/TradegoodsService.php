<?php

namespace App\Services;

class TradegoodsService extends BaseService
{

    public function getAll()
    {
        return $this->db->fetchAll("SELECT * FROM tradegoods");
    }

    public function getOne( $id )
    {
        return $this->db->fetchAll("SELECT * FROM tradegoods WHERE id = ". $id );
    }

    // function save($good)
    // {
    //     $this->db->insert("tradegoods", $good);
    //     return $this->db->lastInsertId();
    // }

    // function update($id, $good)
    // {
    //     return $this->db->update('tradegoods', $good, ['id' => $id]);
    // }

    // function delete($id)
    // {
    //     return $this->db->delete("tradegoods", array("id" => $id));
    // }

}
