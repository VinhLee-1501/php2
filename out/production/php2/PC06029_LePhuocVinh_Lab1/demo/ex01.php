<?php

class MyRectangle
{
    public $x, $y;
    function newArea($a, $b)
    {
        return $a * $b;
    }

    function getArea(){
        return $this->newArea($this->x, $this->y);
    }
}

$myObj = new MyRectangle();
$myObj->x = 4;
$myObj->y = 5;

echo $myObj->getArea();