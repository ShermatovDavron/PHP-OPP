<?php

namespace controllers;

use vendor\myframe\Controller;

class ProductController extends Controller
{
    public function list()
    {
        $name = "Davron Shermatov";
        $list = [
            [
                'name' => "Davon",
                "age" => 22
            ],
            [
                'name' => "Eshmat",
                "age" => 28
            ]
        ];
        $this->view->render('product/list', [
            "name" => $name,
            "productList" => $list
        ]);
    }

    public function add()
    {
        $this->view->render("product/add");
    }
}