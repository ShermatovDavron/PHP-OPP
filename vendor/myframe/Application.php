<?php

namespace vendor\myframe;
class Application
{
    public $defaultController = 'SiteController';
    public $defaultFunction = 'index';

    public $id = null;

    public function run()
    {
        $uri = $_SERVER["REQUEST_URI"];
        $data = explode('/', trim($uri, '/'));
//          echo '<pre>';
//          print_r($data);die();
        if ($uri === '/dars.loc' || $uri === '/dars.loc/' || $uri === '/dars.loc/index.php') {
            $className = "controllers\\" . $this->defaultController;
            $functionName = $this->defaultFunction;
        } else {
              $index = 0;
            if ($data[1] !== 'index.php') {
                $index=1;
            }
            $className = ucfirst($data[2-$index]) . "Controller";
            $className = "controllers\\" . $className;
            if (strpos($data[3-$index], "?")) {
                $params = explode('?', $data[3-$index]);
                $functionName = $params[0];
            } else {
                $functionName = $data[3-$index];
            }
            if (isset($data[4])) {
                $this->id = $data[4];
            }
        }
        $site = new $className;
        if (is_null($this->id)) {
            $site->{$functionName}();
        } else {
            $site->{$functionName}($this->id);
        }


    }
}