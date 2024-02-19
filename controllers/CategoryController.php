<?php

namespace controllers;

use Couchbase\View;
use vendor\myframe\Connection;
use vendor\myframe\Controller;
use vendor\myframe\views;

class CategoryController extends Controller
{
    public function list()
    {
        $sql = "select * from category";
        $conn = new Connection();
        $db = $conn->getConnection();
        $state =$db->prepare($sql);
        $state->execute();
        $result=$state->fetchAll();
        $this->view->render('category/list',['list'=>$result]);
    }
    public function add()
    {
        $this->view->render('category/add');
    }
    public function update()
    {
        $this->view->render('category/update');
    }
    public function delete()
    {
        $this->view->render('category/delete');
    }
}