<?php

namespace models;

use vendor\myframe\Connection;
use vendor\myframe\Model;

class Product extends Model
{
    function tableName()
    {
        return "product";
    }

    public function insertCategory()
    {
        $sql = "insert into product values";
        $state =$this->db->prepare($sql);
        $state->execute();
        return $state->fetchAll();
    }
}