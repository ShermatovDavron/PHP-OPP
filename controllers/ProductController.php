<?php

namespace controllers;

use models\Category;
use models\Product;
use vendor\myframe\Connection;
use vendor\myframe\Controller;
use vendor\myframe\Views;


class ProductController extends Controller
{
    public function list()
    {
        $product = new Product();
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $result = $product->getList($page);
        echo "<pre>";
        print_r($result);
//        $pageCount = $product->getPageCount();
        $this->view->render('product/list',[
            "productList"=>$result
        ]);
    }

    public function add()
    {
        $this->view->render("product/add");
    }
}