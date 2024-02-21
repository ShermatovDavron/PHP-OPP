<?php

namespace vendor\myframe;

use components\Constants;
use vendor\myframe\Connection;
use PDO;
class Model
{
    public $db;
    public $tableName;
    public $page;

    public function __construct()
    {
        $request=new Request();
        $this->page= $request->page;
        $con = new Connection();
        $this->db = $con->getConnection();
        $this->tableName=$this->tableName();
    }
    public function tableName()
    {
        return "user";
    }
    public function getList( $withoutlimit = false)
    {
        $offset=($this->page-1)*Constants::LIMIT;
        if ($withoutlimit){
            $sql = "Select * from {$this->tableName}";
            $state = $this->db->prepare($sql);
        }else{
            $sql = "Select * from {$this->tableName} limit :offset, :limit ";
            $state = $this->db->prepare($sql);
            $state->bindValue(":limit", Constants::LIMIT, PDO::PARAM_INT);
            $state->bindValue(":offset", $offset, PDO::PARAM_INT);
        }
        $state->execute();
        $result = $state->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function getPageCount()
    {
        $sql = "select * from {$this->tableName}";
        $state =$this->db->prepare($sql);
        $state->execute();
        $total_rows = $state->rowCount();
        return ceil($total_rows/Constants::LIMIT);
    }
    public function getRowById($id)
    {
        $state = $this->db->prepare("select * from {$this->tableName} where id=:id");
        $state -> bindValue(":id",$id,PDO::PARAM_INT);
        $state->execute();
        return $state->fetch(PDO::FETCH_OBJ);
    }
}