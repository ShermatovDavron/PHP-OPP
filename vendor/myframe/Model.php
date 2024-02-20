<?php

namespace vendor\myframe;

use components\Constants;
use vendor\myframe\Connection;
use PDO;
class Model
{
    public $db;
    public $tableName;
    public function __construct()
    {
        $con = new Connection();
        $this->db = $con->getConnection();
        $this->tableName=$this->tableName();
    }
    public function tableName()
    {
        return "user";
    }
    public function getList($page, $withoutlimit = false)
    {
        $offset=($page-1)*Constants::LIMIT;
        if ($withoutlimit){
            $sql = "Select * from {$this->tableName}";
            $state = $this->db->prepare($sql);
        }else{
            $sql = "Select * from {$this->tableName} limit :offset, :limit";
            $state = $this->db->prepare($sql);
            $state->bindValue(":limit", Constants::LIMIT, PDO::PARAM_INT);
            $state->bindValue(":offset", $offset, PDO::PARAM_INT);
        }
        $result = $state->fetchAll(PDO::FETCH_OBJ);
        print_r($result);
        return $result;
    }
}