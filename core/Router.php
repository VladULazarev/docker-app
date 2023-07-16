<?php

namespace Core;

use App\Controllers\ErrorController;

class Router
{
    const ROUTE = [];

    /**
     * @return array
     */
    public static function getRoute(): array
    {
        $uriParts = explode('/', $_SERVER['REQUEST_URI']);

        if(! $uriParts[1]) {
            /**
             * It means we have the following uri: http://domainname.com
             */
            define('ROUTE', ['home']);
        } else {
            /**
             * If something wrong is happening
             */
            return ErrorController::notFound();
        }

        return ROUTE;
    }
}
