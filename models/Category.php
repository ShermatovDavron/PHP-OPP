<?php

namespace models;

use components\Constants;
use vendor\myframe\Connection;
use vendor\myframe\Model;
use PDO;

class Category extends Model
{
    function tableName()
    {
        return "category";
    }
    public $db;
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
        $state = $this->db->prepare("select * from category where id=:id");
        $state -> bindValue(":id",$id,PDO::PARAM_INT);
        $state->execute();
        return $state->fetch(PDO::FETCH_OBJ);
    }
    public  function save($name)
    {
        $sql = "INSERT INTO category(name) values(:name)";
        $state = $this->db->prepare($sql);
        $state->bindValue(":name",$name);
        $state->execute();
    }
    public function update($id,$title)
    {
        $sql = "UPDATE category set name=:name where id =:id";
        $state = $this->db->prepare($sql);
        $state->bindValue(":name",$title);
        $state->bindValue(":id",$id);
        $state->execute();
    }

}