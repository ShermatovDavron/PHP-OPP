<?php

namespace vendor\myframe;

class Model
{
    public $db;
    public function __construct()
    {
        $con = new Connection();
        $this->db = $con->getConnection();
    }
}