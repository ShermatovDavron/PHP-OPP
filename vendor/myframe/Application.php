<?php
namespace vendor\myframe;
class Application
{
        private $id=null;
      public function run()
      {
          $uri=$_SERVER["REQUEST_URI"];
          $data = explode('/',$uri);
          $data[3] = ucfirst($data[3])."Controller";
          $className = "controllers\\".$data[3];
          $functionName = $data[4];
          if (isset($data[5])){
              $this->id = $data[5];
          }
          $site = new $className;
            if (is_null($this->id)){
                $site->{$functionName}();
            }else{
                $site->{$functionName}($this->id);
            }

      }
}