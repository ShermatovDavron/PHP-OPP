<?php

namespace vendor\myframe;

class Controller
{
    public Views $view;
    public function __construct()
    {
        $this->view = new Views();
    }
    public function render($list,$data=null)
    {
        $this->view->render($list,$data);
    }
}