<?php

namespace vendor\myframe;

class Request
{
    public $page=1;
    public $sort;
    public function __construct()
    {
        if(isset($_GET['page'])) {
            $this->page = $_GET['page'];
        }
    }
}