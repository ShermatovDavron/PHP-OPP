<?php

namespace controllers;

use models\Product;
use vendor\myframe\Connection;
use vendor\myframe\Controller;

class ProductController extends Controller
{
    public function list()
    {
        $product = new Product();
        $product->getList();
        $this->view->render('product/list',[
            "productList"=>$product
        ]);
    }

    public function add()
    {
        $this->view->render("product/add");
    }
}