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
        $result = $category->getList($page);
        $pageCount = $category->getPageCount();
        $this->view->render('category/list', [
            'listArr' => $result,
            'pageCount' => $pageCount
        ]);
    }

    public function add()
    {
        if (isset($_POST['cat_add'])){
            $category = new Category();
//            $category->validate();
            $category->save($_POST['name']);
        }
        $this->view->render('category/add');
    }

    public function update($id)
    {
        $category = new Category();
        if (isset($_POST['cat_update'])){
//            $category->validate();
            $category->update($id,$_POST['name']);
            header("Location:/dars.loc/index.php/category/list");exit();
        }
        $result = $category->getCategoryById($id);
        $this->view->render('category/update',["category"=>$result]);
    }

    public function delete()
    {
        $this->view->render('category/delete');
    }
}