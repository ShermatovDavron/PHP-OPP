<?php

namespace vendor\myframe;

class views
{
    public function render($list,$data=null)
    {
       if (!is_null($data)){
           extract($data);
       }
        include "views/layout/main.php";
        include "views/$list.php";
        include "views/layout/footer.php";
    }
}
