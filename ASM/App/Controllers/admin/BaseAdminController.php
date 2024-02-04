<?php

namespace App\Controllers\admin;

use App\Core\Render;

class BaseAdminController
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