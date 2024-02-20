<?php

namespace controllers;

//use Couchbase\View;
use models\Category;
use vendor\myframe\Connection;
use vendor\myframe\Controller;
use vendor\myframe\Views;


class CategoryController extends Controller
{
    public function list()
    {
        $category = new Category();
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $result = $category->getCategoryList($page);
        $pageCount = $category->getPageCount();
        $this->view->render('category/list', [
            'listArr' => $result,
            'pageCount' => $pageCount
        ]);
    }

    public function add()
    {
        $this->view->render('category/add');
    }

    public function update($id)
    {
        $this->view->render('category/update');
        $category = new Category();
        $result = $category->getCategoryById($id);
        print_r($result);
    }

    public function delete()
    {
        $this->view->render('category/delete');
    }
}