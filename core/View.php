<?php

namespace Core;

use App\Controllers\ErrorController;

class View
{
    /**
     * Display the current 'view'
     *
     * @param string $path
     * @return void
     */
    public static function render(string $path): void
    {
        if(! file_exists("app/views/{$path}.php")) {
            ErrorController::notFound();
        }
        include "app/views/{$path}.php";
    }
}
