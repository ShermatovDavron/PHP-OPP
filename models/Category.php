<?php

namespace models;

use components\Constants;
use vendor\myframe\Connection;
use vendor\myframe\Model;
use PDO;

class Category extends Model
{
    public $db;
    public function getCategoryList($page, $withoutlimit = false)
    {
        $offset=($page-1)*Constants::LIMIT;
        if ($withoutlimit){
            $sql = "Select * from category";
            $state = $this->db->prepare($sql);
        }else{
            $sql = "Select * from category limit :offset, :limit";
            $state = $this->db->prepare($sql);
            $state->bindValue(":limit", Constants::LIMIT, PDO::PARAM_INT);
            $state->bindValue(":offset", $offset, PDO::PARAM_INT);
        }
        $state->execute();
        $result = $state->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getPageCount()
    {
        $sql = "select * from category";
        $state =$this->db->prepare($sql);
        $state->execute();
        $total_rows = $state->rowCount();
        return ceil($total_rows/Constants::LIMIT);
    }
    public function getCategoryById($id)
    {
        $sql = "select * from category where id=:id";
        $state = $this->db->prepare($sql);
        $state = bindValue(":id",$id,PDO::PARAM_INT);
        $state->execute();
        return $state->fetch(PDO::FETCH_ASSOC);
    }
}