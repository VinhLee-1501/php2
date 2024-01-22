<?php

namespace App\core;

class Form
{
    public static function begin($action, $method)
    {
        echo sprintf('<form method="%s" action="%s">', $action, $method);
        return new Form();
    }

    public static function end()
    {
        return '</form>';
    }

    public static function field($attributes)
    {
        return new Filed($attributes);
    }
}