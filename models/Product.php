<?php

namespace models;

use vendor\myframe\Connection;
use vendor\myframe\Model;

class Product extends Model
{
    public function getList()
    {
        $sql = "select * from product";
        $state =$this->db->prepare($sql);
        $state->execute();
        return $state->fetchAll();
    }
    public function insertCategory()
    {
        $sql = "insert into product values";
        $state =$this->db->prepare($sql);
        $state->execute();
        return $state->fetchAll();
    }
}