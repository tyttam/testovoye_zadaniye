<?php
namespace app\lib;

class Dev
{
    function debug($value)
    {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
        exit;
    }
}
