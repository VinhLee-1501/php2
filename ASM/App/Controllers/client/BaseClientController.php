<?php

namespace App\Controllers\client;

use App\Core\Render;

class BaseClientController
{
    protected Render|array $load;

    public function __construct()
    {
        $this->load = new Render();
    }
    public function  redirect($url, $refresh = null): void
    {
        header('location:' . $url);
    }
}